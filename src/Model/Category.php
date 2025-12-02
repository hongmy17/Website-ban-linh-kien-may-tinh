<?php

namespace App\Model;
use Exception;

class Category extends Model {
  protected $table = "categories";

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }
}