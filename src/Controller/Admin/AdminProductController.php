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
      "pageName" => "product/index.php",
      "products" => $products,
    ]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "product/add-form.php"]);
  }

  public function edit() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "product/edit-form.php"]);
  }

  public function info() {
    $productModel = new Product();
    $product = $productModel->find($_GET["id"]);

    $categoryModel = new Category();
    $category = $categoryModel->find($product["category_id"]);

    $optionsID = $productModel->getOptionsID($product["id"]);
    $optionsWithValues = $productModel->getOptionsName($optionsID);

    $variants = $productModel->getProductVariantsWithOptions($product["id"]);

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "pageName" => "product/info.php",
      "product" => $product,
      "category" => $category,
      "optionsWithValues" => $optionsWithValues,
      "variants" => $variants,
    ]);
  }
}