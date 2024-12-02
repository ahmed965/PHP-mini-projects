<?php

namespace App\Models;

use App\DTO\PurchaseDto;
use PDO;

class PurchaseModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function savePurchase(PurchaseDto $purchaseDto): ?int
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO purchase (customer_id, purchase_date, subtotal, tax, total_amount, payment_method, status)
                  VALUES (:customer_id, :purchase_date, :subtotal, :tax, :total_amount, :payment_method, :status)');

            $stmt->execute([
                ':customer_id' => $purchaseDto->getCutomerId(),
                ':purchase_date' => $purchaseDto->getPurchaseDate()->format('Y-m-d'),
                ':subtotal' => $purchaseDto->getSubtotal(),
                ':tax' => $purchaseDto->getTax(),
                ':total_amount' => $purchaseDto->getTotalAmount(),
                ':payment_method' => $purchaseDto->getPaymentMethod(),
                ':status' => $purchaseDto->getStatus(),
            ]);

            return $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
