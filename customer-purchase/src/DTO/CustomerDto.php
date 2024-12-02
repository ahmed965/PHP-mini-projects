<?php
namespace App\DTO;

class CustomerDto
{
    private int $id;
    private string $name;
    private string $email;
    private string $address;
    private string $phoneNumber;

    public function getId(): int
    {
        return $this->getId();
    }

    public function setId(int $id): CustomerDto
    {

        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CustomerDto
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): CustomerDto
    {
        $this->email = $email;

        return $this;

    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): CustomerDto
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): CustomerDto
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
