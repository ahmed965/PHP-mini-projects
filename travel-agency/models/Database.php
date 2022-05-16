<?php
  abstract class Database {

    private $conn;

    protected function getConnection() 
    {
      if ($this->conn == null) {
        try {
          $this->conn = new PDO('mysql:dbname=travel-agency;host=localhost', 'root', '');
        } 
        catch(Exception $e) {
          echo $e->getMessage();
        }    
      }
      return $this->conn;
    }

  }
