<?php

namespace App\Model;

use App\Interface\Validate;
use PDO;

abstract class Model implements Validate
{
  protected $table;
  protected $connection;
  private Database $database;

  public function __construct()
  {
    $this->database = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
    $this->connection = $this->database->connect();
  }

  public function findAll()
  {
    $sql = "SELECT * FROM {$this->table}";
    $rows = $this->connection->query($sql);
    return $rows->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($id)
  {
    $sql = "SELECT * FROM {$this->table} WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
