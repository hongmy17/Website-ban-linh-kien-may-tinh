<?php

namespace App\Model;

use PDO;

class OrderDetail extends Model
{
  protected $table = 'order_details';

  public function getTableName(): string
  {
    return $this->table;
  }

  public function validate(array $data): bool
  {
    return true;
  }

  public function addToCart($orderData)
  {
    $existing = $this->getExisting($orderData["orderID"], $orderData["productID"], $orderData["variantID"]);

    if ($existing) {
      $newQty = $existing['quantity'] + $orderData["quantity"];
      $sql = "UPDATE order_details SET quantity = ? WHERE id = ?";

      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$newQty, $existing['id']]);

      return $existing['id'];
    } else {
      $sql = "
        INSERT INTO order_details 
        (order_id, product_id, variant_id, price, quantity) 
        VALUES (?, ?, ?, ?, ?)
      ";

      $stmt = $this->connection->prepare($sql);
      $stmt->execute([
        $orderData["orderID"],
        $orderData["productID"],
        $orderData["variantID"],
        $orderData["price"],
        $orderData["quantity"]
      ]);

      return $this->connection->lastInsertId();
    }
  }

  public function getExisting($orderID, $productID, $variantID)
  {
    $sql = "
      SELECT * FROM order_details 
      WHERE order_id = ? 
        AND product_id = ?
        AND (
          (variant_id = ? AND ? IS NOT NULL)
          OR (variant_id IS NULL AND ? IS NULL)
        )
    ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$orderID, $productID, $variantID, $variantID, $variantID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function deleteItem($orderData)
  {
    $variantID = $orderData["variantID"];

    if ($variantID === null) {
      $sql = "DELETE FROM order_details WHERE id = ? AND order_id = ? AND product_id = ? AND variant_id IS NULL";
      $params = [$orderData["orderDetailID"], $orderData["orderID"], $orderData["productID"]];
    } else {
      $sql = "DELETE FROM order_details WHERE id = ? AND order_id = ? AND product_id = ? AND variant_id = ?";
      $params = [$orderData["orderDetailID"], $orderData["orderID"], $orderData["productID"], $variantID];
    }

    $stmt = $this->connection->prepare($sql);
    $stmt->execute($params);
  }

  public function updateQuantity($orderDetailID, $quantity)
  {
    $sql = "
      UPDATE order_details
      SET quantity = ?
      WHERE id = ?
    ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$quantity, $orderDetailID]);
  }
}
