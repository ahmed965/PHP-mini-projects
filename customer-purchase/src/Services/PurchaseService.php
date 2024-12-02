<?php

namespace App\Services;

use App\DTO\CustomerDto;
use App\DTO\PurchaseDto;
use App\Models\CustomerModel;
use App\Models\PurchaseModel;
use DateTime;
use Exception;

class PurchaseService
{
    public function __construct(
        private CustomerModel $customerModel,
        private PurchaseModel $purchaseModel
    ) {
    }

    public function processPurchase(array $purchasePayload): void
    {
        $customerId = $this->customerModel->saveCustomer(
            $this->createCustomer($purchasePayload));

        if ($customerId === null) {
            throw new Exception('can\'t save customer');
        }

        $purchaseId = $this->purchaseModel->savePurchase(
            $this->createPurchase($purchasePayload, $customerId));

        if ($purchaseId === null) {
            throw new Exception('can\'t save purchase');
        }

    }

    private function createCustomer(array $purchasePayload): CustomerDto
    {
        $customerDto = new CustomerDto();
        $customerDto
            ->setName($purchasePayload['customer']['name'])
            ->setEmail($purchasePayload['customer']['email'])
            ->setAddress($purchasePayload['customer']['address'])
            ->setPhoneNumber($purchasePayload['customer']['phone_number']);

        return $customerDto;
    }

    private function createPurchase(array $purchasePayload, int $customerId): PurchaseDto
    {
        $purchaseDto = new PurchaseDto();
        $purchaseDto->setCutomerId($customerId);
        $purchaseDto->setPurchaseDate(
            new DateTime($purchasePayload['purchase']['purchase_date'])
        );
        $purchaseDto->setSubtotal($purchasePayload['purchase']['subtotal']);
        $purchaseDto->setTax($purchasePayload['purchase']['tax']);
        $purchaseDto->setTotalAmount($purchasePayload['purchase']['total_amount']);
        $purchaseDto->setPaymentMethod($purchasePayload['purchase']['payment_method']);
        $purchaseDto->setStatus($purchasePayload['purchase']['status']);

        return $purchaseDto;
    }
}
