<?php

namespace App\Framework;

class Viewer {
  public function renderAdmin(array $data = []) {
    ob_start();
    extract($data);
    require_once "src/View/Admin/index.php";
    return ob_get_clean();
  }

  public function renderClient(array $data = []) {
    ob_start();
    extract($data);
    require_once "src/View/Client/index.php";
    return ob_get_clean();
  }
}