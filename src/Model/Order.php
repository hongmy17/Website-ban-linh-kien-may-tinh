<?php

namespace App\Model;
use Exception;
use PDO;

class Order extends Model {
  protected $table = "orders";

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }

  public function getOrCreateCart($userId, $address = null) {
    $cartModel = new Cart();
    $cart = $cartModel->getUserCart($userId);

    if ($cart) {
      return $cart;
    }

    $sql = "INSERT INTO orders (user_id, total, is_paid, address) VALUES (?, 0, 0, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userId, $address ?? '']);
    
    $orderId = $this->connection->lastInsertId();

    return [
      'id' => $orderId,
      'user_id' => $userId,
      'total' => 0,
      'is_paid' => 0,
      'address' => $address ?? '',
    ];
  }
}