<?php

namespace App\Model;

use Exception;
use PDO;

class User extends Model
{
  protected $table = "users";

  public function getTableName(): string
  {
    return $this->table;
  }

  public function validate(array $data): bool
  {
    return true;
  }

  // Chức năng Thêm người dùng Admin
  public function create($userData)
  {
    $sql = "
      INSERT INTO users
      (name, email, password)
      VALUES (?, ?, ?)
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $userData["name"],
      $userData["email"],
      $userData["password"],
    ]);
  }

  // chức năng sửa thông tin người dùng Admin
  public function updateAdmin($id, $userData)
  {
    $newImage = $userData["avatar"] ?? null;
    $newPassword = $userData["password"] ?? null;

    $sql = "
      UPDATE users SET 
        name = ?, 
        email = ?,
        address = ?, 
        phone = ?, 
        avatar = COALESCE(NULLIF(?, ''), avatar),
        password = COALESCE(NULLIF(?, ''), password)
      WHERE id = ?
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $userData["name"],
      $userData["email"] ?? "",
      $userData["address"],
      $userData["phone"] ?? "",
      $newImage,
      $newPassword,
      $id
    ]);
  }

   // chức năng sửa thông tin người dùng Client
  public function updateClient($id, $userData)
  {
    $newImage = $userData["avatar"] ?? null;

    $sql = "
      UPDATE users SET 
        name = ?, 
        email = ?,
        address = ?, 
        phone = ?, 
        avatar = COALESCE(NULLIF(?, ''), avatar)
      WHERE id = ?
    ";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      $userData["name"],
      $userData["email"] ?? "",
      $userData["address"],
      $userData["phone"] ?? "",
      $newImage,
      $id
    ]);
  }

  public function deleteUser($userID)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
  }

  public function getUserNameBy($userID)
  {
    $sql = "SELECT name FROM users WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getUserByEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch();
  }
}
