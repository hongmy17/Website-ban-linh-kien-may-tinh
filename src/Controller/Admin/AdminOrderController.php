<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;
use App\Model\Order;
use App\Model\Cart;

class AdminOrderController {
  public function index() {
    $orderModel = new Order();
    $orders = $orderModel->getOrdersWithUser();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách đơn hàng",
      "pageName" => "order/index.php",
      "orders" => $orders,
    ]);
  }

  public function detail() {
    $orderID = $_GET["id"];

    $orderModel = new Order();
    $order = $orderModel->find($orderID);

    $cartModel = new Cart();
    $orderItems = $cartModel->getOrderItems($orderID);

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Chi tiêt đơn hàng",
      "pageName" => "order/detail.php",
      "order" => $order,     
      "orderItems" => $orderItems,     
      "itemCount" => count($orderItems),
    ]);
  }
}