<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Product;

class ClientHomeController {
  public function index() {
    $productModel = new Product();
    $products = $productModel->getProductWithCategories(8);
    $latestProducts = $productModel->getLatestProduct(8);
    $popularProducts = $productModel->getPopularProducts(8);
    $bestSellerProducts = $productModel->getBestSellerProducts(8);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "pageName" => "home/index.php",
      "products" => $products,
      "latestProducts" => $latestProducts,
      "popularProducts" => $popularProducts,
      "bestSellerProducts" => $bestSellerProducts,
    ]);
  }
}