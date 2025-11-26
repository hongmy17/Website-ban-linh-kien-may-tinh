<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientErrorController {
  public function notFound() {
    $viewer = new Viewer();
    echo $viewer->renderClient(["pageName" => "error/404.php"]);
  }
}