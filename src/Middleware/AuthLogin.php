<?php

namespace App\Middleware;

class AuthLogin
{
  public static function handle()
  {
    if (!isset($_SESSION['user_id'])) {
      $_SESSION["error"] = "Vui lòng đăng nhập trước";
      header("Location: /account/login");
      exit;
    }
  }
}