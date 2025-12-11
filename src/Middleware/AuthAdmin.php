<?php

namespace App\Middleware;

class AuthAdmin
{
  public static function handle()
  {
    if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
      header("Location: /account/login");
      exit;
    }
  }
}