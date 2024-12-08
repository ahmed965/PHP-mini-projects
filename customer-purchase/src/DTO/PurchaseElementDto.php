<?php
namespace App\DTO;

class PurchaseElementDto
{
    private int $purchaseId;
    private string $productName;
    private int $quantity;
    private float $unitPrice;
    private float $total;

    public function getPurchaseId(): int
    {
        return $this->purchaseId;
    }

    public function setPurchaseId(int $purchaseId): PurchaseElementDto
    {
        $this->purchaseId = $purchaseId;

        return $this;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): PurchaseElementDto
    {
        $this->productName = $productName;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): PurchaseElementDto
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): PurchaseElementDto
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): PurchaseElementDto
    {
        $this->total = $total;

        return $this;
    }
}
