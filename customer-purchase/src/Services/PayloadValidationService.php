<?php

namespace App\Services;

namespace App\Services;

class PayloadValidationService
{
    private array $errors = [];

    public function validatePurchasePayload(array $purchasePayload): array
    {
        $this->errors = [];

        $this->validateCustomer($purchasePayload['customer'] ?? []);
        $this->validatePurchase($purchasePayload['purchase'] ?? []);
        $this->validatePurchaseElements($purchasePayload['purchase_elements'] ?? []);

        return $this->errors;
    }

    private function validateCustomer(array $customer): void
    {
        if (empty($customer['name'])) {
            $this->errors[] = 'Customer name is required.';
        }
        if (empty($customer['email']) || !filter_var($customer['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'A valid customer email is required.';
        }
        if (empty($customer['address'])) {
            $this->errors[] = 'Customer address is required.';
        }
        if (empty($customer['phone_number']) || !preg_match('/^\d{7,15}$/', $customer['phone_number'])) {
            $this->errors[] = 'A valid customer phone number is required (7-15 digits).';
        }
    }

    private function validatePurchase(array $purchase): void
    {
        if (empty($purchase['purchase_date']) || !strtotime($purchase['purchase_date'])) {
            $this->errors[] = 'A valid purchase date is required.';
        }
        if (!isset($purchase['subtotal']) || !is_numeric($purchase['subtotal']) || $purchase['subtotal'] < 0) {
            $this->errors[] = 'Subtotal must be a positive number.';
        }
        if (!isset($purchase['tax']) || !is_numeric($purchase['tax']) || $purchase['tax'] < 0) {
            $this->errors[] = 'Tax must be a positive number.';
        }
        if (!isset($purchase['total_amount']) || !is_numeric($purchase['total_amount']) || $purchase['total_amount'] < 0) {
            $this->errors[] = 'Total amount must be a positive number.';
        }
        if (empty($purchase['payment_method'])) {
            $this->errors[] = 'Payment method is required.';
        }
        if (empty($purchase['status'])) {
            $this->errors[] = 'Purchase status is required.';
        }
    }

    private function validatePurchaseElements(array $purchaseElements): void
    {
        if (empty($purchaseElements)) {
            $this->errors[] = 'At least one purchase element is required.';

            return;
        }

        foreach ($purchaseElements as $index => $element) {
            if (empty($element['product_name'])) {
                $this->errors[] = 'Product name is required for item ' . ($index + 1) . '.';
            }
            if (!isset($element['quantity']) || !is_numeric($element['quantity']) || $element['quantity'] <= 0) {
                $this->errors[] = 'Quantity must be a positive number for item ' . ($index + 1) . '.';
            }
            if (!isset($element['unit_price']) || !is_numeric($element['unit_price']) || $element['unit_price'] <= 0) {
                $this->errors[] = 'Unit price must be a positive number for item ' . ($index + 1) . '.';
            }
            if (!isset($element['total']) || !is_numeric($element['total']) || $element['total'] <= 0) {
                $this->errors[] = 'Total must be a positive number for item ' . ($index + 1) . '.';
            }
        }
    }
}
