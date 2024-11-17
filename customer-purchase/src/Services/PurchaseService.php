<?php

namespace App\Services;

use App\DTO\CustomerDto;
use App\Models\CustomerModel;
use Exception;

class PurchaseService
{
    public function __construct(
        private CustomerModel $customerModel,
    ) {
    }

    public function processPurchase(array $purchasePayload): void
    {
        if ($this->customerModel->saveCustomer(
            $this->createCustomer($purchasePayload)
        ) === null
        ) {
            throw new Exception('can\'t save customer');
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
}
