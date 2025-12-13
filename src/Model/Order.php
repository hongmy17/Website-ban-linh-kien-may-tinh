<?php

namespace App\Model;

use Exception;
use PDO;

class Order extends Model
{
  protected $table = "orders";

  public function getTableName(): string
  {
    return $this->table;
  }

  public function validate(array $data): bool
  {
    return true;
  }

  public function getOrdersWithUser()
  {
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

  public function getOrCreateCart($userID)
  {
    $cartModel = new Cart();
    $cart = $cartModel->getUserCart($userID);

    if ($cart) {
      return $cart;
    }

    $sql = "
      INSERT INTO orders 
      (user_id, total, is_paid, address, receiver_name, receiver_phone) 
      VALUES (?, 0, 0, NULL, NULL, NULL)
    ";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);

    $orderID = $this->connection->lastInsertId();

    return [
      'id' => $orderID,
      'user_id' => $userID,
      'total' => 0,
      'is_paid' => 0,
    ];
  }

  public function deleteOrder($orderID)
  {
    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$orderID]);
  }

  public function hasItem($orderID)
  {
    $sql = "
      SELECT 1
      FROM order_details
      WHERE order_id = ?
      LIMIT 1
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$orderID]);

    return $stmt->fetchColumn() !== false;
  }

  public function getUserOrders($userID)
  {
    $sql = "
        SELECT 
            o.id,
            o.total,
            o.is_paid,
            o.address,
            o.receiver_name,
            o.receiver_phone,
            o.created_at,
            o.updated_at
        FROM orders o
        WHERE o.user_id = ? 
          AND o.is_paid = 1
        ORDER BY o.created_at DESC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
