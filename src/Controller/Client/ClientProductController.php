<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Product;
use App\Model\Category;

class ClientProductController {
  public function index() {
    $productModel = new Product();
    $products = $productModel->getProductWithCategories();

    $categoryModel = new Category();
    $categoriesWithCount = $categoryModel->getCategoriesWithCount();

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "pageName" => "product/index.php",
      "products" => $products,
      "categoriesWithCount" => $categoriesWithCount,
    ]);
  }

  public function detail() {
    $categoryModel = new Category();
    $categoriesWithCount = $categoryModel->getCategoriesWithCount();

    $productModel = new Product();
    $productID = $_GET["id"];
    $product = $productModel->getProductDetail($productID);
    $options  = $productModel->getProductOptions($productID);
    $variants = $productModel->getVariantsForJavascript($productID);
    $optionValues = [];
    foreach ($options as $opt) {
      $optionValues[$opt['id']] = $productModel->getOptionValues($productID, $opt['id']);
    }

    $relatedProducts = $productModel->getRelatedProductsWithCategory($productID, $product["category_id"]);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "pageName" => "product/detail.php",
      "categoriesWithCount" => $categoriesWithCount,
      "product" => $product,
      "options" => $options,
      "variants" => $variants,
      "optionValues" => $optionValues,
      "relatedProducts" => $relatedProducts,
    ]);
  }

  public function bestSeller() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "product/best-seller.php"]);
  }
}