<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminUserController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách người dùng",
      "pageName" => "user/index.php",
    ]);
  }

  public function add() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thêm người dùng",
      "pageName" => "user/add-form.php"
    ]);
  }

  public function edit() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Sửa người dùng",
      "pageName" => "user/edit-form.php",
    ]);
  }

  public function info() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thông tin người dùng",
      "pageName" => "user/info.php",
    ]);
  }
}