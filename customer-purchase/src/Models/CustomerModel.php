<?php

namespace App\Models;

use App\DTO\CustomerDto;
use PDO;

class CustomerModel
{

    public function __construct(private PDO $pdo)
    {
    }

    public function saveCustomer(CustomerDto $customer): ?int
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Customer (name, email, address, phone_number) VALUES (:name, :email, :address, :phone)");
            $stmt->execute([
                ':name' => $customer->getName(),
                ':email' => $customer->getEmail(),
                ':address' => $customer->getAddress(),
                ':phone' => $customer->getPhoneNumber(),
            ]);
            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            return null;
        }
    }
}
