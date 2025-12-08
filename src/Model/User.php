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
}