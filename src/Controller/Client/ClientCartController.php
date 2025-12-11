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

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Giỏ hàng của bạn",
      "pageName" => "cart/index.php",
      "cartItems" => $cartItems,
      "cartTotal" => $cartInfo["total"],
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
    $userID = 1;

    // if (!$userID) {
    //   header('Location: /login');
    //   exit;
    // }

    $cartModel = new Cart();
    $cartInfo = $cartModel->getUserCart($userID);
    $cartItems = $cartModel->getCartItems($userID);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Thanh toán",
      "pageName" => "cart/check-out.php",
      "cartItems" => $cartItems,
      "cartTotal" => $cartInfo["total"],
      "orderID" => $cartInfo["id"] ?? null,
    ]);
  }

  public function pay()
  {
    $orderID = (int) $_GET["order_id"];
    $cartModel = new Cart();

    $checkOutData = [
      "receiver_name" => $_POST["name"],
      "address" => $_POST["address"],
      "receiver_phone" => $_POST["phone"],
    ];

    $cartModel->pay($orderID, $checkOutData);
    header("Location: /cart");
    exit;
  }
}
