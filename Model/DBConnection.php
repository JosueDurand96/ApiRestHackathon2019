<?php
class DBConnection extends PDO {
  /* Variables*/
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $database = 'db_turismogo';
  private $charset = 'utf8';
  private $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
  );
  /* Construction to connect with the database*/
  public function __construct() {
    try {
      parent::__construct('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->database . ';charset=' . $this->charset, $this->user, $this->password, $this->opt);
    } catch (PDOException $e) {
      echo "Error!: " . $e->getMessage();
      die();
    }
  }
}
$obj = new DBConnection();