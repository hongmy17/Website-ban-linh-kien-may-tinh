<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminUserController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "user/index.php"]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "user/add-form.php"]);
  }

  public function edit() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "user/edit-form.php"]);
  }

  public function info() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "user/info.php"]);
  }
}