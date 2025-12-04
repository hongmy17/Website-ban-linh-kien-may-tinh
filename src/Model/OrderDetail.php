<?php

namespace App\Model;

use PDO;

class OrderDetail extends Model
{
  protected $table = 'order_details';

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }

  public function addToCart($orderId, $productId, $variantId, $price, $quantity = 1) {
    $existing = $this->findExisting($orderId, $productId, $variantId);

    if ($existing) {
      $newQty = $existing['quantity'] + $quantity;
      $sql = "UPDATE order_details SET quantity = ? WHERE id = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$newQty, $existing['id']]);
      return $existing['id'];
    } else {
      $sql = "INSERT INTO order_details 
        (order_id, product_id, variant_id, price, quantity) 
        VALUES (?, ?, ?, ?, ?)";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute([$orderId, $productId, $variantId, $price, $quantity]);
      return $this->connection->lastInsertId();
    }
  }

  public function findExisting($orderId, $productId, $variantId) {
    $sql = "SELECT * FROM order_details 
      WHERE order_id = ? AND product_id = ? AND variant_id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$orderId, $productId, $variantId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function removeFromCart($orderDetailId, $userId) {
    $sql = "
      DELETE od FROM order_details od
      JOIN orders o ON od.order_id = o.id
      WHERE od.id = ? AND o.user_id = ? AND o.is_paid = 0
    ";
    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([$orderDetailId, $userId]);
  }

  public function updateQuantity($orderDetailId, $quantity, $userId) {
    if ($quantity <= 0) {
      return $this->removeFromCart($orderDetailId, $userId);
    }

    $sql = "
      UPDATE order_details od
      JOIN orders o ON od.order_id = o.id
      SET od.quantity = ?
      WHERE od.id = ? AND o.user_id = ? AND o.is_paid = 0
    ";
    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([$quantity, $orderDetailId, $userId]);
  }
}