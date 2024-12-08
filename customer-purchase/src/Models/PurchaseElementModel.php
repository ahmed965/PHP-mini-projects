<?php

namespace App\Models;

use App\DTO\PurchaseElementDto;
use App\Exceptions\PurchaseElementException;
use PDO;
use PDOException;

class PurchaseElementModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function savePurchaseElement(PurchaseElementDto $purchaseElementDto): bool
    {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO purchase_elements (purchase_id, product_name, quantity, unit_price, total)
                VALUES (:purchase_id, :product_name, :quantity, :unit_price, :total)');

            return $stmt->execute([
                'purchase_id' => $purchaseElementDto->getPurchaseId(),
                'product_name' => $purchaseElementDto->getProductName(),
                'quantity' => $purchaseElementDto->getQuantity(),
                'unit_price' => $purchaseElementDto->getUnitPrice(),
                'total' => $purchaseElementDto->getTotal(),
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage() . PHP_EOL . $e->getTraceAsString();
            throw new PurchaseElementException('cant\'save purchase element');
        }
    }
}
