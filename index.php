<?php

use App\Router;
use App\Controller\Admin\AdminDashboardController;
use App\Controller\Admin\AdminUserController;
use App\Controller\Admin\AdminProductController;
use App\Controller\Admin\AdminCategoryController;
use App\Controller\Admin\AdminOrderController;

require_once "vendor/autoload.php";


$router = new Router();

// Admin
$router->add("/admin", ["controller" => AdminDashboardController::class, "action" => "index"]);

// User
$router->add("/admin/user", ["controller" => AdminUserController::class, "action" => "index"]);
$router->add("/admin/user/add", ["controller" => AdminUserController::class, "action" => "add"]);
$router->add("/admin/user/edit", ["controller" => AdminUserController::class, "action" => "edit"]);
$router->add("/admin/user/info", ["controller" => AdminUserController::class, "action" => "add"]);

// Product
$router->add("/admin/product", ["controller" => AdminProductController::class, "action" => "index"]);
$router->add("/admin/product/add", ["controller" => AdminProductController::class, "action" => "add"]);
$router->add("/admin/product/edit", ["controller" => AdminProductController::class, "action" => "edit"]);
$router->add("/admin/product/info", ["controller" => AdminProductController::class, "action" => "add"]);

// Category
$router->add("/admin/category", ["controller" => AdminCategoryController::class, "action" => "index"]);
$router->add("/admin/category/add", ["controller" => AdminCategoryController::class, "action" => "add"]);
$router->add("/admin/category/edit", ["controller" => AdminCategoryController::class, "action" => "edit"]);

// Order
$router->add("/admin/order", ["controller" => AdminOrderController::class, "action" => "index"]);
$router->add("/admin/order/detail", ["controller" => AdminOrderController::class, "action" => "detail"]);

$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);
$query = parse_url($uri, PHP_URL_QUERY);

if ($query) {
  parse_str($query, $_GET);
}

$params = $router->match($path);

if ($params == false) {
  exit("Trang khong ton tai");
}

$controller = $params["controller"];
$action = $params["action"];

$classController = new $controller();
$classController->$action();