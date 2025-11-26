<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientContactController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "contact/index.php"]);
  }
}