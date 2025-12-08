<?php

namespace App\Controller\Admin;

use App\Model\Product;
use App\Model\Category;
use App\Framework\Viewer;

class AdminProductController {
  public function index() {
    $productModel = new Product();
    $products = $productModel->findAll();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách sản phẩm",
      "pageName" => "product/index.php",
      "products" => $products,
    ]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thêm sản phẩm",
      "pageName" => "product/add-form.php",
    ]);
  }

  public function edit() {
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
      "title" => "Sửa sản phẩm - " . $product["name"],
      "pageName" => "product/edit-form.php",
      "product" => $product,
      "options" => $options,
      "variants" => $variants,
      "optionValues" => $optionValues,
      "categories" => $categories,
    ]);
  }

  public function info() {
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
}