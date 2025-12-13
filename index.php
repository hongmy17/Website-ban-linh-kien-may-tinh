<?php

require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
session_start();

use App\Router;

// Auth
use App\Middleware\AuthAdmin;

// Client
use App\Controller\Client\ClientHomeController;
use App\Controller\Client\ClientProductController;
use App\Controller\Client\ClientContactController;
use App\Controller\Client\ClientErrorController;
use App\Controller\Client\ClientCartController;
use App\Controller\Client\ClientAccountController;

// Admin
use App\Controller\Admin\AdminDashboardController;
use App\Controller\Admin\AdminUserController;
use App\Controller\Admin\AdminProductController;
use App\Controller\Admin\AdminCategoryController;
use App\Controller\Admin\AdminOrderController;
use App\Controller\Admin\AdminContactController;

$router = new Router();

// Client
$router->add("/", ["controller" => ClientHomeController::class, "action" => "index"]);

// Product
$router->add("/product", ["controller" => ClientProductController::class, "action" => "index"]);
$router->add("/product/detail", ["controller" => ClientProductController::class, "action" => "detail"]);

// Contact
$router->add("/contact", ["controller" => ClientContactController::class, "action" => "index"]);

// Error
$router->add("/404-error", ["controller" => ClientErrorController::class, "action" => "notFound"]);

// Cart
$router->add("/cart", ["controller" => ClientCartController::class, "action" => "index"]);
$router->add("/cart/add", ["controller" => ClientCartController::class, "action" => "add"]);
$router->add("/cart/update", ["controller" => ClientCartController::class, "action" => "update"]);
$router->add("/cart/delete", ["controller" => ClientCartController::class, "action" => "delete"]);
$router->add("/cart/check-out", ["controller" => ClientCartController::class, "action" => "checkOut"]);
$router->add("/cart/pay", ["controller" => ClientCartController::class, "action" => "pay"]);

// Account
$router->add("/account", ["controller" => ClientAccountController::class, "action" => "index"]);
$router->add("/account/login", ["controller" => ClientAccountController::class, "action" => "login"]);
$router->add("/account/edit", ["controller" => ClientAccountController::class, "action" => "edit"]);
$router->add("/account/update", ["controller" => ClientAccountController::class, "action" => "update"]);
$router->add("/account/postLogin", ["controller" => ClientAccountController::class, "action" => "postLogin"]);
$router->add("/account/register", ["controller" => ClientAccountController::class, "action" => "register"]);
$router->add("/account/postRegister", ["controller" => ClientAccountController::class, "action" => "postRegister"]);
$router->add("/account/logout", ["controller" => ClientAccountController::class, "action" => "logout"]);

$adminRoutes = [
  // admin
  "/admin" => ["controller" => AdminDashboardController::class, "action" => "index"],

  // User
  "/admin/user" => ["controller" => AdminUserController::class, "action" => "index"],
  "/admin/user/add" => ["controller" => AdminUserController::class, "action" => "add"],
  "/admin/user/edit" => ["controller" => AdminUserController::class, "action" => "edit"],
  "/admin/user/info" => ["controller" => AdminUserController::class, "action" => "info"],
  "/admin/user/update" => ["controller" => AdminUserController::class, "action" => "update"],

  // Product
  "/admin/product" => ["controller" => AdminProductController::class, "action" => "index"],
  "/admin/product/add" => ["controller" => AdminProductController::class, "action" => "add"],
  "/admin/product/store" => ["controller" => AdminProductController::class, "action" => "store"],
  "/admin/product/storeVariant" => ["controller" => AdminProductController::class, "action" => "storeVariant"],
  "/admin/product/edit" => ["controller" => AdminProductController::class, "action" => "edit"],
  "/admin/product/update" => ["controller" => AdminProductController::class, "action" => "update"],
  "/admin/product/updateVariant" => ["controller" => AdminProductController::class, "action" => "updateVariant"],
  "/admin/product/info" => ["controller" => AdminProductController::class, "action" => "info"],
  "/admin/product/delete" => ["controller" => AdminProductController::class, "action" => "delete"],
  "/admin/product/deleteVariant" => ["controller" => AdminProductController::class, "action" => "deleteVariant"],

  // Category
  "/admin/category" => ["controller" => AdminCategoryController::class, "action" => "index"],
  "/admin/category/add" => ["controller" => AdminCategoryController::class, "action" => "add"],
  "/admin/category/edit" => ["controller" => AdminCategoryController::class, "action" => "edit"],

  // Contact
  "/admin/contact" => ["controller" => AdminContactController::class, "action" => "index"],

  // Order
  "/admin/order" => ["controller" => AdminOrderController::class, "action" => "index"],
  "/admin/order/detail" => ["controller" => AdminOrderController::class, "action" => "detail"],
];

foreach ($adminRoutes as $path => $config) {
  $router->add(
    $path,
    $config,
    [AuthAdmin::class]
  );
}

$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);

$params = $router->match($path);

if ($params == false) {
  header("Location: /404-error");
}

$controller = $params["controller"];
$action = $params["action"];

$classController = new $controller();
$classController->$action();
