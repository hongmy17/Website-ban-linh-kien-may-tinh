<?php

namespace App\Controller\Admin;

use App\Model\Product;
use App\Model\Category;
use App\Framework\Viewer;
use GuzzleHttp\Handler\Proxy;

class AdminProductController
{
  public function index()
  {
    $productModel = new Product();
    $products = $productModel->findAll();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách sản phẩm",
      "pageName" => "product/index.php",
      "products" => $products,
    ]);
  }

  public function add()
  {
    $categoryModel = new Category();
    $categories = $categoryModel->findAll();

    $productModel = new Product();
    $fullOptions = $productModel->getFullOptions();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thêm sản phẩm",
      "pageName" => "product/add-form.php",
      "categories" => $categories,
      "fullOptions" => $fullOptions,
    ]);
  }

  public function store()
  {
    $productModel = new Product();

    $productData = [
      "name" => trim($_POST["name"]),
      "description" => $_POST["description"] ?? "",
      "base_price" => (float)$_POST["base_price"],
      "base_discount_price" => $_POST["base_discount_price"] ? (float)$_POST["base_discount_price"] : null,
      "category_id" => (int)$_POST["category_id"],
      "base_image" => $_FILES["base_image"]["name"] ?? null,
    ];

    if (!empty($_FILES["base_image"]["name"])) {
      $target = "upload/product/" . basename($_FILES["base_image"]["name"]);
      move_uploaded_file($_FILES["base_image"]["tmp_name"], $target);
    }

    $options = $_POST["options"];
    $productModel->store($productData, $options);
    $productID = $productModel->getLatestProductID();

    header("Location: /admin/product/edit?id=$productID");
    exit;
  }

  public function storeVariant()
  {
    $productID = $_GET["product_id"];
    $productModel = new Product();

    $variantData = [
      "sku_id" => $_POST["sku_id"],
      "price" => (float)$_POST["price"],
      "discount_price" => $_POST["discount_price"] ? (float)$_POST["discount_price"] : null,
      "quantity" => (int)$_POST["quantity"],
      "options" => $_POST["variants"]["options"],
    ];

    $productModel->storeVariant($productID, $variantData);
    header("Location: /admin/product/edit?id=$productID");
    exit;
  }

  public function edit()
  {
    $categoryModel = new Category();
    $categories = $categoryModel->findAll();

    $productModel = new Product();
    $productID = $_GET["id"];

    $product = $productModel->getProductDetail($productID);
    $options  = $productModel->getProductOptions($productID);
    $variants = $productModel->getVariantsForAdminEdit($productID);

    $optionValues = [];
    foreach ($options as $opt) {
      $optionValues[$opt['id']] = $productModel->getOptionValues($productID, $opt['id']);
    }

    $optionFullValues = [];
    foreach ($options as $opt) {
      $optionFullValues[$opt["id"]] = $productModel->getOptionFullValues($opt["id"]);
    }

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Sửa sản phẩm - " . $product["name"],
      "pageName" => "product/edit-form.php",
      "product" => $product,
      "options" => $options,
      "variants" => $variants,
      "optionValues" => $optionValues,
      "optionFullValues" => $optionFullValues,
      "categories" => $categories,
    ]);
  }

  public function update()
  {
    $productID = $_GET["id"];
    $productModel = new Product();

    $productData = [
      "name" => trim($_POST["name"]),
      "description" => $_POST["description"] ?? "",
      "base_price" => (float)$_POST["base_price"],
      "base_discount_price" => $_POST["base_discount_price"] ? (float)$_POST["base_discount_price"] : null,
      "category_id" => (int)$_POST["category_id"],
      "base_image" => $_FILES["base_image"]["name"] ?? null,
    ];

    if (!empty($_FILES["base_image"]["name"])) {
      $target = "upload/product/" . basename($_FILES["base_image"]["name"]);
      move_uploaded_file($_FILES["base_image"]["tmp_name"], $target);
    }

    $productModel->update($productID, $productData);
    header("Location: /admin/product/edit?id=$productID");
    exit;
  }

  public function updateVariant()
  {
    $productID = $_GET["product_id"];
    $variantID = $_GET["variant_id"];
    $productModel = new Product();

    $variantData = [
      "id" => $variantID,
      "price" => (float)$_POST["price"],
      "discount_price" => $_POST["discount_price"] ? (float)$_POST["discount_price"] : null,
      "quantity" => (int)$_POST["quantity"],
    ];

    $productModel->updateVariant($productID, $variantData);
    header("Location: /admin/product/edit?id=$productID");
    exit;
  }

  public function info()
  {
    $categoryModel = new Category();
    $categories = $categoryModel->findAll();

    $productModel = new Product();
    $productID = $_GET["id"];

    $product = $productModel->getProductDetail($productID);
    $options  = $productModel->getProductOptions($productID);
    $variants = $productModel->getVariantsForAdminEdit($productID);
    $optionValues = [];
    foreach ($options as $opt) {
      $optionValues[$opt['id']] = $productModel->getOptionValues($productID, $opt['id']);
    }

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thông tin sản phẩm - " . $product["name"],
      "pageName" => "product/info.php",
      "product" => $product,
      "options" => $options,
      "variants" => $variants,
      "optionValues" => $optionValues,
      "categories" => $categories,
    ]);
  }

  public function delete()
  {
    $productID = $_GET["id"];
    $productModel = new Product();
    $productModel->delete($productID);

    header("Location: /admin/product");
    exit;
  }

  public function deleteVariant()
  {
    $productModel = new Product();
    $productID = $_GET["product_id"];
    $variantID = $_GET["variant_id"];

    $productModel->deleteVariant($variantID);
    header("Location: /admin/product/edit?id=$productID");
    exit;
  }
}
