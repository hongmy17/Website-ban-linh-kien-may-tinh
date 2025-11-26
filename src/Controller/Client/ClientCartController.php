<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientCartController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "cart/index.php"]);
  }
  
  public function checkOut() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "cart/check-out.php"]);
  }
}