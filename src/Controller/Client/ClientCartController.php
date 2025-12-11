<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderDetail;

class ClientCartController
{
  public function index()
  {
    $userID = 1;

    // if (!$userID) {
    //   header('Location: /login');
    //   exit;
    // }

    $cartModel = new Cart();
    $cartInfo = $cartModel->getUserCart($userID);
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
      "orderID" => $cartInfo["id"] ?? null,
      "itemCount" => count($cartItems),
    ]);
  }

  public function add()
  {
    $userID = 1;
    $cartModel = new Cart();

    $orderData = [
      "productID" => (int) $_GET["product_id"],
      "variantID" => isset($_GET["variant_id"]) ? (int) $_GET["variant_id"] : NULL,
      "price" => $_POST["hidden_price"],
      "quantity" => $_POST["quantity"] ?? 1,
    ];

    $cartModel->add($userID, $orderData);
    header("Location: /cart");
    exit;
  }

  public function update()
  {
    $cartModel = new Cart();

    $orderData = [
      "orderID" => (int) $_GET["order_id"],
      "orderDetailID" => (int) $_GET["order_detail_id"],
      "quantity" => (int) $_POST["quantity"],
    ];

    $cartModel->update($orderData);
    header("Location: /cart");
    exit;
  }

  public function delete()
  {
    $cartModel = new Cart();

    $orderData = [
      "orderID" => (int) $_GET["order_id"],
      "orderDetailID" => (int) $_GET["order_detail_id"],
      "productID" => (int) $_GET["product_id"],
      "variantID" => !empty($_GET["variant_id"]) && $_GET["variant_id"] !== ""
        ? (int) $_GET["variant_id"]
        : NULL
    ];

    $cartModel->delete($orderData);
    header("Location: /cart");
    exit;
  }

  public function checkOut()
  {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Thanh toán",
      "pageName" => "cart/check-out.php",
    ]);
  }
}
