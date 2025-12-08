<?php

namespace App\Model;
use Exception;
use PDO;

class User extends Model {
  protected $table = "users";

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }

  public function getUserNameBy($userID) {
    $sql = "SELECT name FROM users WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$userID]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}