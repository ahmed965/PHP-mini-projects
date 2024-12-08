<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\PurchaseController;
use App\Database\DatabaseConnection;
use App\Models\CustomerModel;
use App\Models\PurchaseElementModel;
use App\Models\PurchaseModel;
use App\Services\PayloadValidationService;
use App\Services\PurchaseService;

$purchaseCustomerData = json_decode(
    file_get_contents(__DIR__ . '/data/purchase_customer.json'),
    true
);

$databaseConnection = DatabaseConnection::getInstance();
$customerModel = new CustomerModel($databaseConnection);
$purchaseModel = new PurchaseModel($databaseConnection);
$purchaseElementModel = new PurchaseElementModel($databaseConnection);
$purchaseController = new PurchaseController(
    new PurchaseService(
        $customerModel,
        $purchaseModel,
        $purchaseElementModel,
        $databaseConnection
    ),
    new PayloadValidationService,
    $purchaseCustomerData
);

$purchaseController->savePurchases();
