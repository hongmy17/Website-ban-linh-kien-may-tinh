<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminProductController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "product/index.php"]);
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
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "product/info.php"]);
  }
}