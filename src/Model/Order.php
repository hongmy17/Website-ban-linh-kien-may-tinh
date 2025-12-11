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
}
