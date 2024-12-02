<?php
namespace App\DTO;

use DateTime;

class PurchaseDTO
{
    private int $customerId;
    private DateTime $purchaseDate;
    private float $subtotal;
    private float $tax;
    private float $totalAmount;
    private string $paymentMethod;
    private string $status;

    public function getCutomerId(): int
    {
        return $this->customerId;
    }

    public function setCutomerId($customerId): PurchaseDTO
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getPurchaseDate(): DateTime
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(DateTime $purchaseDate): PurchaseDTO
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    public function setSubtotal(float $subtotal): PurchaseDTO
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): PurchaseDTO
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getTax(): float
    {
        return $this->tax;
    }

    public function setTax(float $tax): PurchaseDTO
    {
        $this->tax = $tax;

        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): PurchaseDTO
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): PurchaseDTO
    {
        $this->status = $status;

        return $this;
    }
}
