<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientProductController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "product/index.php"]);
  }

  public function detail() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "product/detail.php"]);
  }

  public function bestSeller() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "product/best-seller.php"]);
  }
}