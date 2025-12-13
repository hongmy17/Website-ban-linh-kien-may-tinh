<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Cart;
use App\Model\Product;
use App\Model\Order;

class ClientCartController
{
  public function index()
  {
    $userID = $_SESSION["user_id"];

    $cartModel = new Cart();
    $cartInfo = $cartModel->getUserCart($userID);
    $cartItems = $cartModel->getCartItems($userID);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Giỏ hàng của bạn",
      "pageName" => "cart/index.php",
      "cartItems" => $cartItems,
      "cartTotal" => $cartInfo["total"] ?? 0,
      "orderID" => $cartInfo["id"] ?? null,
      "itemCount" => count($cartItems),
    ]);
  }

  public function add()
  {
    $userID = $_SESSION["user_id"];
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
    $userID = $_SESSION["user_id"];
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
    $userID = $_SESSION["user_id"];
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
    $userID = $_SESSION["user_id"];

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

  public function getQtyToUpdate($productsData)
  {
    $productsQty = [
      "products" => [],
      "variants" => [],
    ];

    foreach ($productsData as $productID => $variants) {
      foreach ($variants as $id => $value) {
        $hasVariant = (int) $id > 0;

        if ($hasVariant) {
          $productsQty["variants"][$id] = (int) $value;
        } else {
          $productsQty["products"][$productID] = (int) $value;
        }
      }
    }

    return $productsQty;
  }

  public function increaseProductSold($productsSold)
  {
    $productModel = new Product();

    foreach ($productsSold as $productID => $quantity) {
      $productModel->increaseProductSold($productID, $quantity);
    }
  }

  public function increaseVariantSold($variantsSold)
  {
    $productModel = new Product();
    $productsID = [];

    foreach ($variantsSold as $variantID => $quantity) {
      $productID = $productModel->getProductIDByVariantID($variantID);
      if (!in_array($productID, $productsID)) {
        $productsID[] = $productID;
      }

      $productModel->increaseVariantSold($variantID, $quantity);
    }

    foreach ($productsID as $productID) {
      $productModel->updateBaseSold($productID);
    }
  }

  public function updateProductQtyStock($productsQty)
  {
    $productModel = new Product();

    foreach ($productsQty as $productID => $quantity) {
      $productModel->updateProductQtyStock($productID, $quantity);
    }
  }

  public function updateVariantQtyStock($variantsQty)
  {
    $productModel = new Product();
    $productsID = [];

    foreach ($variantsQty as $variantID => $quantity) {
      $productID = $productModel->getProductIDByVariantID($variantID);
      if (!in_array($productID, $productsID)) {
        $productsID[] = $productID;
      }

      $productModel->updateVariantQtyStock($variantID, $quantity);
    }

    foreach ($productsID as $productID) {
      $productModel->updateBaseQtyStock($productID);
    }
  }

  public function pay()
  {
    $orderID = (int) $_GET["order_id"];

    $name = trim($_POST["name"] ?? '');
    $address = trim($_POST["address"] ?? '');
    $phone = trim($_POST["phone"] ?? '');
    $delivery = trim($_POST["delivery"] ?? '');

    $errors = [];
    $old = [
      'name' => $name,
      'address' => $address,
      'phone' => $phone,
      'delivery' => $delivery,
    ];

    // Validation cơ bản
    if (empty($name)) {
      $errors['name'] = 'Vui lòng nhập họ và tên người nhận!';
    }
    if (empty($address)) {
      $errors['address'] = 'Vui lòng nhập địa chỉ nhận hàng!';
    }
    if (empty($phone) || !preg_match('/^[0-9]{10,11}$/', $phone)) {
      $errors['phone'] = 'Số điện thoại phải gồm 10-11 chữ số!';
    }
    if (empty($delivery)) {
      $errors['delivery'] = 'Vui lòng chọn phương thức thanh toán!';
    }

    // === KIỂM TRA TỒN KHO TRƯỚC KHI THANH TOÁN ===
    $cartModel = new Cart();
    $cartItems = $cartModel->getCartItems($_SESSION['user_id']); // Lấy giỏ hàng hiện tại (chưa thanh toán)

    // $_POST["quantities"] có dạng: quantities[product_id][variant_id] = qty
    $requestedQuantities = $_POST["quantities"] ?? [];

    foreach ($cartItems as $item) {
      $productID = $item['product_id'];
      $variantID = $item['variant_id'] ?? 0; // null → 0 nếu không có biến thể
      $currentQty = $item['quantity'];
      $stock = $item['stock'];

      // Lấy số lượng người dùng yêu cầu (nếu có thay đổi ở giỏ hàng trước đó)
      $requestedQty = $currentQty; // mặc định giữ nguyên

      if (isset($requestedQuantities[$productID][$variantID])) {
        $requestedQty = (int) $requestedQuantities[$productID][$variantID];
      }

      // Kiểm tra vượt tồn kho
      if ($requestedQty > $stock) {
        $config = !empty($item['config_display']) ? " ({$item['config_display']})" : '';
        $sku = !empty($item['sku_id']) ? " (Mã: {$item['sku_id']})" : '';

        $errors['stock'] = "Sản phẩm \"{$item['product_name']}{$config}{$sku}\" chỉ còn {$stock} sản phẩm trong kho (bạn đang đặt {$requestedQty}). Vui lòng quay lại giỏ hàng điều chỉnh!";
        break; // chỉ cần 1 lỗi là đủ để dừng
      }
    }

    // Nếu có lỗi (bao gồm cả lỗi tồn kho)
    if ($errors) {
      $_SESSION['checkout_errors'] = $errors;
      $_SESSION['checkout_old'] = $old;
      header("Location: /cart/check-out");
      exit;
    }

    // === TIẾP TỤC THANH TOÁN KHI KHÔNG CÓ LỖI ===
    $checkOutData = [
      "receiver_name" => $name,
      "address" => $address,
      "receiver_phone" => $phone,
    ];

    $cartModel->pay($orderID, $checkOutData);

    $productsQty = $this->getQtyToUpdate($requestedQuantities);

    $this->increaseProductSold($productsQty["products"]);
    $this->increaseVariantSold($productsQty["variants"]);
    $this->updateProductQtyStock($productsQty["products"]);
    $this->updateVariantQtyStock($productsQty["variants"]);

    $_SESSION["success"] = "Bạn đã đặt hàng thành công!";
    header("Location: /cart");
    exit;
  }

  public function history()
  {
    // Kiểm tra đăng nhập
    if (!isset($_SESSION['user_id'])) {
      header('Location: /login');
      exit;
    }

    $userID = $_SESSION['user_id'];

    $orderModel = new Order();
    $cartModel = new Cart(); // dùng để lấy chi tiết sản phẩm trong đơn

    // Lấy tất cả đơn hàng đã thanh toán của user
    $orders = $orderModel->getUserOrders($userID);

    // Lấy chi tiết sản phẩm cho từng đơn hàng
    $orderItems = [];
    foreach ($orders as $order) {
      $orderItems[$order['id']] = $cartModel->getOrderItems($order['id']);
    }

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Lịch sử mua hàng",
      "pageName" => "cart/history.php",
      "orders" => $orders,          // danh sách đơn hàng
      "orderItems" => $orderItems   // chi tiết sản phẩm theo từng đơn
    ]);
  }

  public function detail()
  {
    $orderID = (int) $_GET['id'];

    $orderModel = new Order();
    $cartModel = new Cart();

    // Lấy đơn hàng đã thanh toán
    $orders = $orderModel->getUserOrders($_SESSION['user_id']);
    $order = null;

    foreach ($orders as $o) {
      if ($o['id'] == $orderID) {
        $order = $o;
        break;
      }
    }

    if (!$order) {
      $_SESSION["error"] = "Đơn hàng không tòn tại";
      header("Location: /cart/history");
      exit;
    }

    // Lấy sản phẩm trong đơn
    $items = $cartModel->getOrderItems($orderID);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Chi tiết đơn hàng #{$orderID}",
      "pageName" => "cart/detail.php",
      "order" => $order,
      "items" => $items
    ]);
  }

}
