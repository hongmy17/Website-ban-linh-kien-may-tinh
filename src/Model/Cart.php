<?php

namespace App\Model;

use PDO;

class Cart extends Model
{
  protected $table = 'orders';

  public function getTableName(): string
  {
    return $this->table;
  }

  public function validate(array $data): bool
  {
    return true;
  }

  public function getUserCart($userID)
  {
    $sql = "
      SELECT o.*, 
        COALESCE(SUM(od.price * od.quantity), 0) AS calculated_total
      FROM orders o
      LEFT JOIN order_details od ON o.id = od.order_id
      WHERE o.user_id = ? 
        AND o.is_paid = 0
      GROUP BY o.id
      LIMIT 1
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getCartItems($userID)
  {
    $sql = "
      SELECT 
        od.id AS order_detail_id,
        od.product_id,
        od.variant_id,
        od.price,
        od.quantity,

        p.name AS product_name,
        p.base_image,

        pv.sku_id,
        pv.discount_price,

        GROUP_CONCAT(
            CONCAT(o.name, ': ', ov.name)
            ORDER BY o.id SEPARATOR ' - '
        ) AS config_display,

        CASE
          WHEN od.variant_id IS NOT NULL THEN pv.quantity_in_stock
          ELSE p.base_quantity_in_stock
        END AS stock

      FROM orders ord
      LEFT JOIN order_details od ON ord.id = od.order_id
      LEFT JOIN products p ON od.product_id = p.id
      LEFT JOIN product_variants pv ON od.variant_id = pv.id
      LEFT JOIN variant_values vv ON pv.id = vv.variant_id AND vv.product_id = p.id
      LEFT JOIN options o ON vv.option_id = o.id
      LEFT JOIN option_values ov ON vv.value_id = ov.id

      WHERE ord.user_id = ? 
        AND ord.is_paid = 0

      GROUP BY od.id, p.id, pv.id
      ORDER BY od.created_at DESC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOrderItems($orderID)
  {
    $sql = "
      SELECT 
        od.id AS order_detail_id,
        od.product_id,
        od.variant_id,
        od.price,
        od.quantity,

        p.name AS product_name,
        p.base_image,

        pv.sku_id,
        pv.discount_price,

        GROUP_CONCAT(
            CONCAT(o.name, ': ', ov.name)
            ORDER BY o.id SEPARATOR ' - '
        ) AS config_display

      FROM orders ord
      LEFT JOIN order_details od ON ord.id = od.order_id
      LEFT JOIN products p ON od.product_id = p.id
      LEFT JOIN product_variants pv ON od.variant_id = pv.id
      LEFT JOIN variant_values vv ON pv.id = vv.variant_id AND vv.product_id = p.id
      LEFT JOIN options o ON vv.option_id = o.id
      LEFT JOIN option_values ov ON vv.value_id = ov.id

      WHERE od.order_id = ? 

      GROUP BY od.id, p.id, pv.id
      ORDER BY od.created_at DESC
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$orderID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function recalculateTotal($orderID)
  {
    $sql = "
        UPDATE orders 
        INNER JOIN (
            SELECT order_id, COALESCE(SUM(price * quantity), 0) AS new_total
            FROM order_details
            WHERE order_id = ?
            GROUP BY order_id
        ) AS od ON orders.id = od.order_id
        SET orders.total = od.new_total
    ";

    $stmt = $this->connection->prepare($sql);
    return $stmt->execute([$orderID]);
  }

  public function add($userID, $orderData)
  {
    $orderModel = new Order();
    $orderDetailModel = new OrderDetail();

    $cartInfo = $orderModel->getOrCreateCart($userID);
    $orderData["orderID"] = $cartInfo["id"];

    $orderDetailModel->addToCart($orderData);
    $this->recalculateTotal($orderData["orderID"]);
  }

  public function update($orderData)
  {
    $orderDetailModel = new OrderDetail();
    $orderDetailModel->updateQuantity($orderData["orderDetailID"], $orderData["quantity"]);
    $this->recalculateTotal($orderData["orderID"]);
  }

  public function delete($orderData)
  {
    $orderModel = new Order();
    $orderDetailModel = new OrderDetail();

    $orderDetailModel->deleteItem($orderData);
    $hasItem = $orderModel->hasItem($orderData["orderID"]);

    if ($hasItem) {
      $this->recalculateTotal($orderData["orderID"]);
    } else {
      $orderModel->deleteOrder($orderData["orderID"]);
    }
  }

  public function pay($orderID, $checkOutData)
  {
    $sql = "
      UPDATE orders
      SET 
        is_paid = 1,
        address = ?,
        receiver_name = ?,
        receiver_phone = ?
      WHERE id = ?
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $checkOutData["address"],
      $checkOutData["receiver_name"],
      $checkOutData["receiver_phone"],
      $orderID,
    ]);
  }
}
