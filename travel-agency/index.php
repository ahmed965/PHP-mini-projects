<?php
require_once __DIR__ . '\controllers\TravelController.php';

$travelController = new TravelController();

$destination = $_GET['q'] ?? "";
$continent_id = $_GET['continent'] ?? 0;
$sortingDate =  $_GET['date'] ?? "";

$travelController->showHomePage($destination, $continent_id, $sortingDate);
