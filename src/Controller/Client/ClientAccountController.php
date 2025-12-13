<?php

namespace App\Controller\Client;

use App\Framework\Viewer;
use App\Model\User;

class ClientAccountController
{
  public function index()
  {
    $userID = $_SESSION["user_id"];

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

  public function edit()
  {
    $userModel = new User;
    $user = $userModel->find($_GET['id']);
    $viewer = new Viewer();
    echo $viewer->renderClient([
      "title" => "Chỉnh sửa hồ sơ",
      "pageName" => "account/edit.php",
      "user" => $user
    ]);
  }

  public function update()
  {
    $userID = $_GET["id"];
    $userModel = new User();

    $userData = [
      "name" => trim($_POST["name"]),
      "email" => $_POST["email"] ?? "",
      "address" => trim($_POST["address"]),
      "phone" => $_POST["phone"] ?? "",
      "avatar" => $_FILES["avatar"]["name"] ?? null,
    ];

    if (!empty($_FILES["avatar"]["name"])) {
      $target = "/upload/user/" . basename($_FILES["avatar"]["name"]);
      move_uploaded_file($_FILES["avatar"]["tmp_name"], $target);
    }

    $userModel->updateClient($userID, $userData);
    header("Location: /account/edit?id=$userID");  
    exit;
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
      $_SESSION['register_errors'] = $errors;
      $_SESSION['register_old'] = $old;
      header("Location: /account/register");
      exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $userData = [
      "name" => $name,
      "email" => $email,
      "password" => $hash,
    ];

    $userModel->create($userData);
    $_SESSION["success"] = "Bạn đã tạo tài khoản thành công";
    header("Location: /account/login");
    exit;
  }

  public function postLogin()
  {
    $userModel = new User();

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $errors = [];
    $old = ['email' => $email];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email không hợp lệ.';
    }

    $user = $userModel->getUserByEmail($email);

    if (!$user) {
      $errors['email'] = 'Email không tồn tại.';
    } else if (!$user || !password_verify($password, $user['password'])) {
      $errors['general'] = 'Vui lòng nhập đúng mật khẩu!';
      var_dump(1);
    }
    //  elseif ($user['status'] ?? 'active' !== 'active') {
    //   $errors['general'] = 'Tài khoản của bạn đã bị khóa.';
    // }

    if ($errors) {
      $_SESSION['login_errors'] = $errors;
      $_SESSION['login_old'] = $old;
      header("Location: /account/login");
      exit;
    }

    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['is_admin'] = $user['is_admin'];
    $_SESSION["success"] = "Bạn đã đăng nhập thành công";

    header("Location: /account");
    exit;
  }

  public function logout()
  {
    $_SESSION = [];
    session_destroy();
    header("Location: /");
    exit;
  }
}
