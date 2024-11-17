<?php

namespace App\Models;

use PDO;

class PurchaseModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function savePurchase($purchaseDto)
    {}
}
