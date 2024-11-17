<?php

namespace App\Database;

use PDO;

class DatabaseConnection
{
    private ?PDO $pdo = null;

    private static $instance = null;

    private function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=customer_order", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new DatabaseConnection();
        }

        return self::$instance->pdo;
    }
}
