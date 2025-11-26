<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminDashboardController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin(["pageName" => "dashboard/index.php"]);
  }
}