<?php

namespace App\Middleware;

class AuthAdmin
{
  public static function handle()
  {
    if (!isset($_SESSION['user_id'])) {
      AuthLogin::handle();
    } else if ($_SESSION['is_admin'] != 1) {
      $_SESSION["error"] = "Chỉ admin mới được truy cập trang này";
      header("Location: /not-admin");
      exit;
    }
  }
}