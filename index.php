<?php

require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use App\Router;

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
$router->add("/cart/check-out", ["controller" => ClientCartController::class, "action" => "checkOut"]);

// Account
$router->add("/account/login", ["controller" => ClientAccountController::class, "action" => "login"]);
$router->add("/account/register", ["controller" => ClientAccountController::class, "action" => "register"]);
$router->add("/account", ["controller" => ClientAccountController::class, "action" => "index"]);

// Admin
$router->add("/admin", ["controller" => AdminDashboardController::class, "action" => "index"]);

// User
$router->add("/admin/user", ["controller" => AdminUserController::class, "action" => "index"]);
$router->add("/admin/user/add", ["controller" => AdminUserController::class, "action" => "add"]);
$router->add("/admin/user/edit", ["controller" => AdminUserController::class, "action" => "edit"]);
$router->add("/admin/user/info", ["controller" => AdminUserController::class, "action" => "info"]);
$router->add("/admin/user/update", ["controller" => AdminUserController::class, "action" => "update"]);


// Product
$router->add("/admin/product", ["controller" => AdminProductController::class, "action" => "index"]);
$router->add("/admin/product/add", ["controller" => AdminProductController::class, "action" => "add"]);
$router->add("/admin/product/store", ["controller" => AdminProductController::class, "action" => "store"]);
$router->add("/admin/product/storeVariant", ["controller" => AdminProductController::class, "action" => "storeVariant"]);
$router->add("/admin/product/edit", ["controller" => AdminProductController::class, "action" => "edit"]);
$router->add("/admin/product/update", ["controller" => AdminProductController::class, "action" => "update"]);
$router->add("/admin/product/updateVariant", ["controller" => AdminProductController::class, "action" => "updateVariant"]);
$router->add("/admin/product/info", ["controller" => AdminProductController::class, "action" => "info"]);
$router->add("/admin/product/delete", ["controller" => AdminProductController::class, "action" => "delete"]);
$router->add("/admin/product/deleteVariant", ["controller" => AdminProductController::class, "action" => "deleteVariant"]);

// Category
$router->add("/admin/category", ["controller" => AdminCategoryController::class, "action" => "index"]);
$router->add("/admin/category/add", ["controller" => AdminCategoryController::class, "action" => "add"]);
$router->add("/admin/category/edit", ["controller" => AdminCategoryController::class, "action" => "edit"]);

// Contact
$router->add("/admin/contact", ["controller" => AdminContactController::class, "action" => "index"]);

// Order
$router->add("/admin/order", ["controller" => AdminOrderController::class, "action" => "index"]);
$router->add("/admin/order/detail", ["controller" => AdminOrderController::class, "action" => "detail"]);

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
