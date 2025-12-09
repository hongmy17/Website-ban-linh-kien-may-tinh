<?php

namespace App\Model;

use Exception;
use PDO;

class Product extends Model
{
  protected $table = "products";

  public function getTableName(): string
  {
    return $this->table;
  }

  public function validate(array $data): bool
  {
    return true;
  }

  public function getLatestProductID()
  {
    $sql = "SELECT MAX(id) AS last_id FROM products";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchColumn();
    return $result;
  }

  public function getProductDetail($productID)
  {
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

  public function getProductWithCategories($limit = null, $offset = 0)
  {
    $sql = "
      SELECT 
        p.id,
        p.name,
        p.base_image,
        p.base_price,
        p.base_discount_price,
        p.view,
        p.sold,
        c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
    ";

    if ($limit !== null) {
      $sql .= " LIMIT :offset, :limit";
    }

    $stmt = $this->connection->prepare($sql);

    if ($limit !== null) {
      $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
      $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getLatestProduct($limit = null, $offset = 0)
  {
    $sql = "
      SELECT 
        p.id,
        p.name,
        p.base_image,
        p.base_price,
        p.base_discount_price,
        p.view,
        p.sold,
        c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
      ORDER BY p.updated_at DESC
    ";

    if ($limit !== null) {
      $sql .= " LIMIT :offset, :limit";
    }

    $stmt = $this->connection->prepare($sql);

    if ($limit !== null) {
      $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
      $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getBestSellerProducts($limit = null, $offset = 0)
  {
    $sql = "
      SELECT 
        p.id,
        p.name,
        p.base_image,
        p.base_price,
        p.base_discount_price,
        p.view,
        p.sold,
        c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
      ORDER BY p.sold DESC
    ";

    if ($limit !== null) {
      $sql .= " LIMIT :offset, :limit";
    }

    $stmt = $this->connection->prepare($sql);

    if ($limit !== null) {
      $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
      $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getFullOptions()
  {
    $sql = "SELECT * FROM options";
    $rows = $this->connection->query($sql);
    return $rows->fetchAll(PDO::FETCH_ASSOC);
  }

  // Lấy option VD: Ram, SSD, CPU
  public function getProductOptions($productID)
  {
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

  // Lấy giá trị option VD: Ram -> 8gb, SSD -> 256
  public function getOptionValues($productID, $optionID)
  {
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

  public function getOptionFullValues($optionID)
  {
    $sql = "
      SELECT 
        id as value_id,
        name as value_name
      FROM option_values 
      WHERE option_id = ?
    ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$optionID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getVariantsForJavascript($productID)
  {
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
        'discount_price' => $row['discount_price'] ? (float)$row['discount_price'] : null,
        'stock'   => (int)$row['stock'],
        'default' => (bool)$row['is_default'],
        'values'  => $map // ví dụ: [1=>12, 2=>5, 3=>10
      ];
    }

    return $variants;
  }

  public function getVariantsForAdminEdit($productID)
  {
    $sql = "
      SELECT 
        pv.id,
        pv.sku_id,
        pv.price,
        pv.discount_price,
        pv.quantity_in_stock,
        pv.is_default,
        GROUP_CONCAT(CONCAT(vv.option_id, ':', vv.value_id) SEPARATOR ',') AS map
      FROM product_variants pv
      LEFT JOIN variant_values vv ON pv.id = vv.variant_id
      WHERE pv.product_id = ? AND pv.is_active = 1
      GROUP BY pv.id
      ORDER BY pv.is_default DESC, pv.price ASC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $variants = [];
    foreach ($rows as $row) {
      $map = [];
      if ($row["map"]) {
        foreach (explode(",", $row["map"]) as $pair) {
          $tmp = explode(":", $pair);
          $map[(int)$tmp[0]] = (int)$tmp[1];
        }
      }

      $variants[] = [
        "id" => (int)$row["id"],
        "sku_id" => $row["sku_id"] ?? "",
        "price" => (float)$row["price"],
        "discount_price" => $row["discount_price"] ? (float)$row["discount_price"] : null,
        "quantity_in_stock" => (int)$row["quantity_in_stock"],
        "is_default" => (bool)$row["is_default"],
        "values" => $map // [option_id => value_id]
      ];
    }

    return $variants;
  }

  public function getRelatedProductsWithCategory($productID, $categoryID)
  {
    $sql = "
      SELECT 
        p.*, c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
      WHERE p.category_id = ?
        AND p.id != ?
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$categoryID, $productID]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPopularProducts($limit)
  {
    $limit = (int)$limit;
    if ($limit <= 0) $limit = 5;

    $sql = "
      SELECT 
        p.*, c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
      ORDER BY p.view DESC
      LIMIT $limit
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function increaseView($productID)
  {
    $sql = "UPDATE products SET view = view + 1 WHERE id = ?";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([$productID]);
  }

  public function getPaginatedProducts($page = 1, $perPage = 6, $categoryId = null)
  {
    $page    = (int)$page;
    $perPage = (int)$perPage;
    if ($page < 1) $page = 1;
    if ($perPage < 1) $perPage = 12;

    $offset = ($page - 1) * $perPage;

    $sql = "
      SELECT 
        p.id,
        p.name,
        p.base_image,
        p.base_price,
        p.base_discount_price,
        p.view,
        p.sold,
        c.name AS category_name
      FROM products p
      LEFT JOIN categories c ON p.category_id = c.id
    ";

    $params = [];

    // Nếu có lọc theo danh mục
    if ($categoryId !== null) {
      $categoryId = (int)$categoryId;
      $sql .= " WHERE p.category_id = ?";
      $params[] = $categoryId;
    }

    // Fix LIMIT/OFFSET trực tiếp
    $sql .= " 
      LIMIT $perPage OFFSET $offset
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getTotalProducts($categoryId = null)
  {
    $sql = "SELECT COUNT(*) FROM products p";

    $params = [];
    if ($categoryId !== null) {
      $sql .= " WHERE p.category_id = ?";
      $params[] = (int)$categoryId;
    }

    $stmt = $this->connection->prepare($sql);
    $stmt->execute($params);

    return (int)$stmt->fetchColumn();
  }

  public function hasDefaultVariant($productID)
  {
    $sql = "SELECT 1 
            FROM product_variants 
            WHERE product_id = ?
              AND is_default = 1 
            LIMIT 1";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);

    return $stmt->fetchColumn() !== false;
  }

  public function storeAndGetVariantID($productID, $variantData)
  {
    $isDefault = 1;
    if ($this->hasDefaultVariant($productID)) {
      $isDefault = 0;
    }

    $sql = "
      INSERT INTO product_variants 
        (product_id, sku_id, price, discount_price, quantity_in_stock, is_default, is_active, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, 1, NOW(), NOW())
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $productID,
      $variantData['sku_id'] ?? '',
      $variantData['price'],
      $variantData['discount_price'] ?: null,
      $variantData['quantity'],
      $isDefault,
    ]);

    $variantID = $this->connection->lastInsertId();
    return $variantID;
  }

  public function storeAndGetProductID($productData)
  {
    $sql = "
      INSERT INTO products
        (name, base_image, base_price, base_discount_price, description, view, sold, category_id, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, 0, 0, ?, NOW(), NOW())
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $productData["name"],
      $productData["base_image"] ?? null,
      $productData["base_price"],
      $productData["base_discount_price"] ?: null,
      $productData["description"] ?? "",
      $productData["category_id"],
    ]);

    $productID = $this->connection->lastInsertId();
    return $productID;
  }

  public function storeProductOptions($productID, $options)
  {
    $sql = "
      INSERT INTO product_options
        (product_id, option_id)
        VALUES (?, ?)
    ";

    $stmt = $this->connection->prepare($sql);
    foreach ($options as $opt) {
      $stmt->execute([$productID, $opt]);
    }
  }

  public function store($productData, $options)
  {
    $productID = $this->storeAndGetProductID($productData);
    if ($options != NULL) {
      $this->storeProductOptions($productID, $options);
    }
  }

  public function storeVariantValue($variantID, $productID, $options)
  {
    $sql = "
      INSERT INTO variant_values 
        (variant_id, product_id, option_id, value_id) 
        VALUES (?, ?, ?, ?)
    ";
    $stmt = $this->connection->prepare($sql);
    foreach ($options as $optionID => $valueID) {
      if ($valueID) {
        $stmt->execute([$variantID, $productID, $optionID, $valueID]);
      }
    }
  }

  public function storeVariant($productID, $variantData)
  {
    $variantID = $this->storeAndGetVariantID($productID, $variantData);
    $this->storeVariantValue($variantID, $productID, $variantData["options"]);
  }

  public function update($productID, $productData)
  {
    $newImage = $productData["base_image"] ?? null;

    $sql = "
      UPDATE products SET 
        name = ?, 
        description = ?, 
        base_price = ?, 
        base_discount_price = ?, 
        category_id = ?, 
        base_image = COALESCE(NULLIF(?, ''), base_image),
        updated_at = NOW()
      WHERE id = ?
    ";

    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([
      $productData["name"],
      $productData["description"] ?? "",
      $productData["base_price"],
      $productData["base_discount_price"] ?: null,
      $productData["category_id"],
      $newImage,
      $productID
    ]);
  }

  public function updateVariant($productID, $variantData)
  {
    $sql = "
      UPDATE product_variants SET
        price = ?,
        discount_price = ?,
        quantity_in_stock = ?,
        updated_at = NOW()
      WHERE id = ? AND product_id = ?
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $variantData["price"],
      $variantData["discount_price"] ?: null,
      $variantData["quantity"],
      $variantData["id"],
      $productID
    ]);
  }

  public function hasVariant($productID)
  {
    $sql = "
      SELECT 1
      FROM product_variants
      WHERE product_id = ?
      LIMIT 1
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);

    return $stmt->fetchColumn() !== false;
  }


  public function delete($productID)
  {
    $this->deleteProductOptions($productID);
    $this->deleteProduct($productID);
  }

  public function deleteProduct($productID)
  {
    if ($this->hasVariant($productID)) {
      echo "<script>confirm('Không thể xóa sản phẩm có biến thể!')</script>" ;
      return;
    }

    $sql = "DELETE FROM {$this->table} WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
  }

  public function deleteProductOptions($productID) {
    $sql = "DELETE FROM product_options WHERE product_id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
  }

  public function deleteProductValues($variantID)
  {
    $sql = "DELETE FROM variant_values WHERE variant_id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$variantID]);
  }

  public function deleteProductVariant($variantID)
  {
    $sql = "DELETE FROM product_variants WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$variantID]);
  }

  public function deleteVariant($variantID)
  {
    $this->deleteProductValues($variantID);
    $this->deleteProductVariant($variantID);
  }
}
