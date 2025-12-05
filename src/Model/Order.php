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

  public function getOrdersWithUser() {
    $sql = "
      SELECT 
        o.*,
        us.name as user_name,
        us.avatar,
        us.email
      FROM orders o
      JOIN users us ON o.user_id = us.id 
    ";
    $rows = $this->connection->query($sql);
    return $rows->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOrCreateCart($userID, $address = null) {
    $cartModel = new Cart();
    $cart = $cartModel->getUserCart($userID);

    if ($cart) {
      return $cart;
    }

    $sql = "INSERT INTO orders (user_id, total, is_paid, address) VALUES (?, 0, 0, ?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID, $address ?? '']);
    
    $orderId = $this->connection->lastInsertId();

    return [
      'id' => $orderId,
      'user_id' => $userID,
      'total' => 0,
      'is_paid' => 0,
      'address' => $address ?? '',
    ];
  }
}