<?php

class Database
{
  private static $db;
  public static function getConnection()
  {
    try {
      if (self::$db === null) {
        self::$db = new PDO('mysql:host=localhost;dbname=goals', 'root', '');
      }
    } catch (PDOException $e) {
      print "Error!: connection to database <br/>";
      die();
    }

    return self::$db;
  }
}