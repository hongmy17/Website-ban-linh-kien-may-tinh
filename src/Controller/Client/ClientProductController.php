<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\Product;
use App\Model\Category;

class ClientProductController {
  public function index() {
    $productModel = new Product();
    $products = $productModel->findAll();

    $categoryModel = new Category();
    $categoriesWithCount = $categoryModel->getCategoriesWithCount();
    $popularProducts = $productModel->getPopularProducts(6);

    // Cấu hình phân trang
    // $perPage = 6; // số sản phẩm mỗi trang
    // $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    // $categoryId = $_GET['category'] ?? null; // lọc theo danh mục (tùy chọn)

    // Lấy dữ liệu phân trang
    // $products = $productModel->getPaginatedProducts($page, $perPage, $categoryId);
    // $totalProducts = $productModel->getTotalProducts($categoryId);
    // $totalPages = ceil($totalProducts / $perPage);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Cửa hàng",
      "pageName" => "product/index.php",
      "products" => $products,
      "categoriesWithCount" => $categoriesWithCount,
      "popularProducts" => $popularProducts,
      // "currentPage"  => $page,
      // "totalPages"   => $totalPages,
      // "totalProducts"=> $totalProducts,
      // "perPage"      => $perPage,
      // "categoryId"   => $categoryId,
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
    $productModel->increaseView($productID);

    $popularProducts = $productModel->getPopularProducts(6);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Chi tiết sản phẩm - " . $product["name"],
      "pageName" => "product/detail.php",
      "categoriesWithCount" => $categoriesWithCount,
      "product" => $product,
      "options" => $options,
      "variants" => $variants,
      "optionValues" => $optionValues,
      "relatedProducts" => $relatedProducts,
      "popularProducts" => $popularProducts,
    ]);
  }
}