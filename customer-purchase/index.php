<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\PurchaseController;
use App\Database\DatabaseConnection;
use App\Models\CustomerModel;
use App\Services\PurchaseService;

$purchaseCustomerData = json_decode(
    file_get_contents(__DIR__ . '/data/purchase_customer.json'),
    true
);

$customerModel = new CustomerModel(DatabaseConnection::getInstance());
$purchaseController = new PurchaseController(
    new PurchaseService($customerModel),
    $purchaseCustomerData);

$purchaseController->savePurchases();
