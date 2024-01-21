<?php
require_once('./Controllers/TrainingPlanController.php');
require_once('./Services/TrainingPlanService.php');
require_once('./RequestValidation/RequestValidation.php');

$trainingPlan = new TrainingPlanController(
  new TrainingPlanService('Data/data.json'),
  new RequestValidation(),
  (array) json_decode(file_get_contents("php://input"), true)
);
$method = $_SERVER['REQUEST_METHOD'];
$url = explode('/', $_SERVER['REQUEST_URI']);
$id = $url[3];
if ($method === 'GET') {
  if (!empty($id)) {
    $trainingPlan->show($id);
  } else {
    $trainingPlan->index();
  }
} elseif ($method = 'POST') {
  $trainingPlan->store();
}