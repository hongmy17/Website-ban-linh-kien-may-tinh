<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientContactController {
  public function index() {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Liên hệ",
      "pageName" => "contact/index.php",
    ]);
  }
}