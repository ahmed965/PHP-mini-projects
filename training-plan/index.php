<?php
require_once('./Controllers/TrainingPlanController.php');
require_once('./Services/TrainingPlanService.php');
require_once('./RequestValidation/RequestValidation.php');

$trainingPlan = new TrainingPlanController(
  new TrainingPlanService('Data/data.json'),
  new RequestValidation()
);
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
  $trainingPlan->index();
} elseif ($method = 'POST') {
  $trainingPlan->store();
}