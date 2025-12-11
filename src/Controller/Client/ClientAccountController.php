<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\User;

class ClientAccountController
{
  public function index()
  {
    $userID = 1;
    $userModel = new User();
    $user = $userModel->find($userID);

    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Tài khoản của tôi",
      "pageName" => "account/index.php",
      "user" => $user,
    ]);
  }

  public function login()
  {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Đăng nhập",
      "pageName" => "account/login.php"
    ]);
  }

  public function register()
  {
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Đăng ký",
      "pageName" => "account/register.php",
    ]);
  }

  public function postRegister()
  {
    $userModel = new User();

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['password_confirm'] ?? '';

    $errors = [];
    $old = ['name' => $name, 'email' => $email];

    if (strlen($name) < 2)
      $errors['name'] = 'Họ tên phải từ 2 ký tự.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      $errors['email'] = 'Email không hợp lệ.';
    if ($userModel->getUserByEmail($email))
      $errors['email'] = 'Email đã được sử dụng.';
    if (strlen($password) < 6)
      $errors['password'] = 'Mật khẩu ít nhất 6 ký tự.';
    if ($password !== $confirm)
      $errors['password_confirm'] = 'Mật khẩu không khớp.';

    if ($errors) {
      $_SESSION['errors'] = $errors;
      $_SESSION['old'] = $old;
      header("Location: account/register");
      exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $userData = [
      "name" => $name,
      "email" => $email,
      "password" => $hash,
    ];

    $userModel->create($userData);
    header("Location: /account/login");
    exit;
  }
}
