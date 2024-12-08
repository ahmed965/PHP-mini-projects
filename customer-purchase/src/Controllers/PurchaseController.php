<?php

namespace App\Controllers;

use App\Services\PurchaseService;
use Exception;

class PurchaseController
{
    public function __construct(
        private PurchaseService $purchaseService,
        private array $purchaseData
    ) {
    }

    public function savePurchases(): void
    {
        try {
            $this->purchaseService->processPurchase($this->purchaseData);
            $this->toJson(
                [
                    'success' => true,
                    'message' => 'purchase and customer are saved',
                ],
                200
            );
        } catch (Exception $e) {
            $this->toJson(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                ],
                400
            );
        }
    }

    private function toJson(array $data, int $statusCode): void
    {
        http_response_code($statusCode);
        echo json_encode($data);
    }
}
