<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminCategoryController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "category/index.php"]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "category/add-form.php"]);
  }

  public function edit() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "category/edit-form.php"]);
  }
}