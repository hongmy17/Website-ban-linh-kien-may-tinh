<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminOrderController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "order/index.php"]);
  }

  public function detail() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "order/detail.php"]);
  }
}