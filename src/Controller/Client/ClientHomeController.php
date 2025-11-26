<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientHomeController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "home/index.php"]);
  }
}