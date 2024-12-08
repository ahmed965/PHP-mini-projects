<?php

namespace App\Services;

use App\DTO\CustomerDto;
use App\DTO\PurchaseDto;
use App\DTO\PurchaseElementDto;
use App\Models\CustomerModel;
use App\Models\PurchaseElementModel;
use App\Models\PurchaseModel;
use DateTime;
use Exception;
use PDO;

class PurchaseService
{
    private const CUSTOMER = 'customer';
    private const PURCHASE = 'purchase';

    public function __construct(
        private CustomerModel $customerModel,
        private PurchaseModel $purchaseModel,
        private PurchaseElementModel $purchaseElementModel,
        private PDO $databaseConnection
    ) {
    }

    public function processPurchase(array $purchasePayload): void
    {
        try {
            $this->databaseConnection->beginTransaction();
            $customerId = $this->customerModel->saveCustomer(
                $this->createCustomer($purchasePayload));

            $purchaseId = $this->purchaseModel->savePurchase(
                $this->createPurchase($purchasePayload, $customerId));

            foreach ($this->createPurchaseElements($purchasePayload, $purchaseId) as $purchaseElementDto) {
                $this->purchaseElementModel->savePurchaseElement($purchaseElementDto);
            }
            $this->databaseConnection->commit();
        } catch (Exception $e) {
            $this->databaseConnection->rollBack();
            throw $e;
        }
    }

    private function createCustomer(array $purchasePayload): CustomerDto
    {
        $customerDto = new CustomerDto();
        $customerDto
            ->setName($purchasePayload[self::CUSTOMER]['name'])
            ->setEmail($purchasePayload[self::CUSTOMER]['email'])
            ->setAddress($purchasePayload[self::CUSTOMER]['address'])
            ->setPhoneNumber($purchasePayload[self::CUSTOMER]['phone_number']);

        return $customerDto;
    }

    private function createPurchase(array $purchasePayload, int $customerId): PurchaseDto
    {
        $purchaseDto = new PurchaseDto();
        $purchaseDto
            ->setCutomerId($customerId)
            ->setPurchaseDate(
                new DateTime($purchasePayload[self::PURCHASE]['purchase_date'])
            )
            ->setSubtotal($purchasePayload[self::PURCHASE]['subtotal'])
            ->setTax($purchasePayload[self::PURCHASE]['tax'])
            ->setTotalAmount($purchasePayload[self::PURCHASE]['total_amount'])
            ->setPaymentMethod($purchasePayload[self::PURCHASE]['payment_method'])
            ->setStatus($purchasePayload[self::PURCHASE]['status']);

        return $purchaseDto;
    }

    private function createPurchaseElements(array $purchasePayload, int $purchaseId): array
    {
        $purchaseElements = [];
        foreach ($purchasePayload['purchase_elements'] as $purchaseElement) {
            $purchaseElementsDto = new PurchaseElementDto();
            $purchaseElementsDto
                ->setPurchaseId($purchaseId)
                ->setProductName($purchaseElement['product_name'])
                ->setQuantity($purchaseElement['quantity'])
                ->setUnitPrice($purchaseElement['unit_price'])
                ->setTotal($purchaseElement['total']);

            $purchaseElements[] = $purchaseElementsDto;
        }

        return $purchaseElements;
    }
}
