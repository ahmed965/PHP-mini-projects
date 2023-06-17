<?php

session_start();
require_once __DIR__ . '/src/Controllers/GoalsController.php';
require_once __DIR__ . '/src/Models/GoalsModel.php';
$goals = new GoalsController(new GoalsModel);

if (isset($_GET['page'])) {

  $page = $_GET['page'];
  switch ($page) {
    case 'goals':
      return $goals->index();
      break;
    case 'add-goal':
      return $goals->add();
      break;
    case 'save-goal':
      return $goals->create($_POST['name'], $_POST['status'], (int) $_POST['cost']);
      break;
    case 'edit-goal':
      return $goals->edit($_GET['id']);
      break;
    case $goals:
      return $goals->index();
      break;
    case 'update-goal':
      return $goals->update(
        $_POST['name'],
        $_POST['status'],
        (int) $_POST['cost'],
        $_GET['id']
      );
      break;
    case 'delete-goal':
      $goals->delete($_GET['id']);
      break;
  }
} else {
  $goals->index();
}