<?php

namespace App\Model;
use Exception;
use PDO;

class Product extends Model {
  protected $table = "products";

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }

  public function getProductDetail($productID) {
    $sql = "
        SELECT 
            p.*, c.name AS category_name
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.id = ?
        LIMIT 1
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getProductWithCategories() {
    $sql = "
        SELECT 
            p.id,
            p.name,
            p.base_image,
            p.base_price,
            p.base_discount_price,
            c.name AS category_name
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        ORDER BY p.id DESC
    ";

    $stmt = $this->connection->query($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function getOptionsID($productID) {
    $sql = "SELECT option_id FROM product_options WHERE product_id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }

  public function getOptionsName($optionIDs) {
    if (empty($optionIDs)) {
      return [];
    }

    $placeholders = str_repeat('?,', count($optionIDs) - 1) . '?';
    $sql = "SELECT id, name FROM options WHERE id IN ($placeholders) ORDER BY id";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute($optionIDs);

    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $result[$row['id']] = $row['name'];
    }
    return $result;
  }

  public function getProductOptions($productID) {
    $sql = "
        SELECT DISTINCT o.id, o.name AS option_name
        FROM options o
        JOIN product_options po ON o.id = po.option_id
        WHERE po.product_id = ?
        ORDER BY o.id ASC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOptionValues($productID, $optionID) {
    $sql = "
        SELECT DISTINCT 
            ov.id AS value_id,
            ov.name AS value_name
        FROM option_values ov
        JOIN variant_values vv ON ov.id = vv.value_id
        JOIN product_variants pv ON vv.variant_id = pv.id
        WHERE vv.product_id = ? 
          AND vv.option_id = ? 
          AND pv.is_active = 1
        ORDER BY ov.name ASC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID, $optionID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getVariantsForJavascript($productID) {
    $sql = "
        SELECT 
            pv.id,
            pv.price,
            pv.discount_price,
            pv.quantity_in_stock AS stock,
            pv.is_default,
            GROUP_CONCAT(CONCAT(vv.option_id, ':', vv.value_id) SEPARATOR ',') AS map
        FROM product_variants pv
        LEFT JOIN variant_values vv ON pv.id = vv.variant_id
        WHERE pv.product_id = ? AND pv.is_active = 1
        GROUP BY pv.id
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $variants = [];
    foreach ($rows as $row) {
        $map = [];
        if ($row['map']) {
            foreach (explode(',', $row['map']) as $pair) {
                $tmp = explode(':', $pair);
                $map[$tmp[0]] = (int)$tmp[1];
            }
        }

        $variants[] = [
            'id'      => (int)$row['id'],
            'price'   => (float)$row['price'],
            'discount_price'=> $row['discount_price'] ? (float)$row['discount_price'] : null,
            'stock'   => (int)$row['stock'],
            'default' => (bool)$row['is_default'],
            'values'  => $map // ví dụ: [1=>12, 2=>5, 3=>10
        ];
    }

    return $variants;
  }

  public function getProductVariants($productID) {
    $sql = 
      "SELECT 
            pv.id,
            pv.sku_id,
            pv.price,
            pv.discount_price,
            pv.quantity_in_stock,
            pv.is_default
        FROM product_variants pv
        WHERE pv.product_id = ?
          AND pv.is_active = 1
        ORDER BY pv.price ASC
      ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductVariantsWithOptions($productID) {
    $sql = "
        SELECT 
            pv.id,
            pv.sku_id,
            pv.price,
            pv.discount_price,
            pv.quantity_in_stock,
            pv.is_default,
            
            GROUP_CONCAT(
                CONCAT(o.name, ':', ov.name) 
                ORDER BY o.id SEPARATOR ' / '
            ) AS config_display

        FROM product_variants pv
        LEFT JOIN variant_values vv ON pv.id = vv.variant_id
        LEFT JOIN options o ON vv.option_id = o.id
        LEFT JOIN option_values ov ON vv.value_id = ov.id
        
        WHERE pv.product_id = ? 
          AND pv.is_active = 1
          
        GROUP BY pv.id
        ORDER BY pv.price ASC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}