<?php

namespace App\Controller\Admin;

use App\Framework\Viewer;

class AdminContactController {

  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
        "title" => "Danh sách liên hệ",
        "pageName" => "contact/index.php",
    ]);
  }
}