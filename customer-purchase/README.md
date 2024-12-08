# Purchase Management System

This is a PHP app that handles customer purchases. It reads a JSON payload from the `data` folder in the root directory, validates it, and stores the information in a database. The app uses Composer for autoloading PHP files.

## Features

- Manage customer information (name, email, address, phone number)
- Handle purchase details (purchase date, subtotal, tax, total amount, payment method, status)
- Manage purchase items (product name, quantity, unit price, total price)
- Validate incoming data and handle errors
- Organized code using Dependency Injection and custom exceptions

## Payload Example

- The JSON payload should be placed in the `data` folder, for example: `data/purchase_customer.json`.

```json
{
  "customer": {
    "name": "Ahmed Bouzguenda",
    "email": "ahmed@Bouzguenda.com",
    "address": "test adress",
    "phone_number": "1234567"
  },
  "purchase": {
    "purchase_date": "2024-11-16",
    "subtotal": 110.0,
    "tax": 10.0,
    "total_amount": 120.0,
    "payment_method": "Paypal",
    "status": "Paid"
  },
  "purchase_elements": [
    {
      "product_name": "Laptop",
      "quantity": 1,
      "unit_price": 100.0,
      "total": 100.0
    },
    {
      "product_name": "Mouse",
      "quantity": 1,
      "unit_price": 10.0,
      "total": 10.0
    }
  ]
}
```

## Response Examples

- If the payload is valid and the data is successfully processed and saved, you will receive the following response:
- returned in the terminal:

```json
{ "success": true, "message": "purchase and customer are saved" }
```

- If there is a validation error or an unexpected issue during processing for example the following response will be
- returned in the terminal:

```json
{ "success": false, "message": "Customer name is required." }
```

## Running the Application

1. Place your JSON payload in the data folder.
2. The database schema is also located in the `data` folder . Import this file into your database.
3. Start the application by running the following command in the terminal:

```bash
php index.php
```
