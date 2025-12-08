<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderDetail;

class ClientCartController {
  public function index() {
    $userID = 1;

    // if (!$userID) {
    //   header('Location: /login');
    //   exit;
    // }

    $cartModel = new Cart();
    $orderModel = new Order();
    $orderDetailModel = new OrderDetail();

    $cartInfo = $cartModel->getUserCart($userID);

    // if (!$cartInfo) {
    //   $cartInfo = $orderModel->getOrCreateCart($userID);
    // }

    $cartItems = $cartModel->getCartItems($userID);

    $calculatedTotal = 0;
    foreach ($cartItems as $item) {
      $price = $item['discount_price'] ?? $item['price'];
      $calculatedTotal += $price * $item['quantity'];
    }

    if ($cartInfo && $cartInfo['calculated_total'] != $calculatedTotal) {
      $cartModel->recalculateTotal($cartInfo['id']);
      $cartInfo['total'] = $calculatedTotal;
    }
    
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Giỏ hàng của bạn",
      "pageName" => "cart/index.php",
      "cartItems" => $cartItems,           
      "cartTotal" => $calculatedTotal,
      "cartOrderId" => $cartInfo["id"] ?? null,
      "itemCount" => count($cartItems),
    ]);
  }
  
  public function checkOut() {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Thanh toán",
      "pageName" => "cart/check-out.php",
    ]);
  }
}