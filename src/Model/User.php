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

  public function update($id, $userData)
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

  public function getUserNameBy($userID)
  {
    $sql = "SELECT name FROM users WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
