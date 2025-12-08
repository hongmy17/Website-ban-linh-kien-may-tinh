<?php

namespace App\Model;
use Exception;
use PDO;

class Contact extends Model {
  protected $table = "contacts";

  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    return true;
  }

  public function getContactsWithUser()  {
    $sql = "
        SELECT 
            c.*,
            us.name as user_name,
            us.avatar,
            us.email as user_email
        FROM contacts c
        JOIN users us ON c.process_by = us.id
    ";
    $rows = $this->connection->query($sql);
    return $rows->fetchAll(PDO::FETCH_ASSOC);
  }
}