<?php
require_once 'Database.php';
require_once 'ContinentModel.php';

class ContinentManager extends Database {

  public function getAllContinents() 
  {
    $stmt = $this->getConnection()->prepare('SELECT * FROM continent') ;
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'ContinentModel');
    $continents = $stmt->fetchAll();
    return $continents;
  }

}