<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;
use App\Model\Category;

class AdminCategoryController {
  public function index() {
    $categoryModal = new Category();
    $categories = $categoryModal->getCategoriesWithCount();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách danh mục",
      "pageName" => "category/index.php",
      "categories" => $categories
    ]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thêm danh mục",
      "pageName" => "category/add-form.php"
    ]);
  }

  public function edit() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Sửa danh mục",
      "pageName" => "category/edit-form.php",
    ]);
  }
}