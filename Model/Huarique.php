<?php

require_once 'DBConnection.php';

class Huarique {
  private $id;
  private $rating;
  private $imagen;
  private $distancia;
  private $hora_atencion;
  private $hora_cierre;
  private $promociones;
  private $nombre;
  private $distrito;
  private $latitud;
  private $longitude;
  private $region;
  private $idplato;
  private $cn;
  private $stmt;

  public function __construct() {
    $this->cn = new DBConnection();
  }

  public function set($attribute, $content) {
    $this->$attribute = $content;
  }
  public function get($attribute) {
    return $this->$attribute;
  }

  public function all() {
    $list = [];
    try {
      $sql = 'SELECT * FROM Huarique WHERE region = ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->region, PDO::PARAM_INT);
      $this->stmt->execute();
      while ($row = $this->stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $list = $row;
      }
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $list;
  }

  public function allByRating() {
    $list = [];
    try {
      $sql = 'SELECT * FROM Huarique ORDER BY rating DESC';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->execute();
      while ($row = $this->stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $list = $row;
      }
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $list;
  }

  public function find() {
    $list = [];
    try {
      $sql = 'SELECT * FROM Huarique WHERE region LIKE ? AND nombre LIKE ?';
      $this->stmt = $this->cn->prepare($sql);
      $this->stmt->bindParam(1, $this->region, PDO::PARAM_INT);
      $this->stmt->bindParam(2, $this->nombre, PDO::PARAM_STR);
      $this->stmt->execute();
      while ($row = $this->stmt->fetchAll(PDO::FETCH_ASSOC)) {
        $list[] = $row;
      }
    } catch (Exception $e) {
      $e->getMessage();
    }
    return $list;
  }

  public function closeConnection() {
    $this->stmt = '';
    $this->cn = '';
  }
}