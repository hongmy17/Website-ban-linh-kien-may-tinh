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
  
  public function getOptionsID($productID) {
    $sql = "SELECT option_id FROM product_options WHERE product_id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$productID]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
  }

  public function getOptionsName($optionIds) {
    $placeholders = str_repeat('?,', count($optionIds) - 1) . '?';
    $sql = "SELECT * FROM options WHERE id IN ($placeholders) ORDER BY id";
    
    $stmt = $this->connection->prepare($sql);
    $stmt->execute($optionIds);
    
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
  }

  public function getProductVariants($productId) {
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
    $stmt->execute([$productId]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductVariantsWithOptions($productId) {
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
    $stmt->execute([$productId]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}