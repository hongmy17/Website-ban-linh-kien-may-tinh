<?php

namespace App\Controller\Client;

use App\Framework\Viewer;

class ClientErrorController
{
  public function notFound()
  {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "404",
      "pageName" => "error/404.php",
    ]);
  }

  public function notAdmin()
  {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Không phải admin",
      "pageName" => "error/not-admin.php",
    ]);
  }
}