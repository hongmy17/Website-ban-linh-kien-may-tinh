<?php

namespace App\Controller\Admin;

use App\Model\User;
use App\Framework\Viewer;

class AdminUserController
{
  public function index()
  {
    $userModel = new User();
    $users = $userModel->findAll();

    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Danh sách người dùng",
      "pageName" => "user/index.php",
      "users" => $users,
    ]);
  }

  public function add()
  {
    $userModel = new User();
    $fullOptions = $userModel->getTableName();
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thêm người dùng",
      "pageName" => "user/add-form.php"
    ]);
  }

  public function edit()
  {
    $userModel = new User;
    $user = $userModel->find($_GET['id']);
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Sửa người dùng",
      "pageName" => "user/edit-form.php",
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
      "password" => $_POST["password"] ?? "",
      "avatar" => $_FILES["avatar"]["name"] ?? null,
    ];

    if (!empty($_FILES["avatar"]["name"])) {
      $target = "/upload/user/" . basename($_FILES["avatar"]["name"]);
      move_uploaded_file($_FILES["avatar"]["tmp_name"], $target);
    }

    $userModel->update($userID, $userData);
    header("Location: /admin/user/edit?id=$userID");  
    exit;
  }

  public function info()
  {
    $userModel = new User();
    $user = $userModel->find($_GET['id']);
    $viewer = new Viewer();
    echo $viewer->renderAdmin([
      "title" => "Thông tin người dùng",
      "pageName" => "user/info.php",
      "user" => $user
    ]);
  }
}
