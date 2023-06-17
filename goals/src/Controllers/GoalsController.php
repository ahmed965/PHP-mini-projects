<?php

require_once dirname(__DIR__) . '/Traits/GoalsTrait.php';
require_once dirname(__DIR__) . '/Dto/Goals.php';
require_once dirname(__DIR__, 2) . '/Config/Config.php';

class GoalsController
{
  use GoalsTrait;
  private $goalsModel;

  public function __construct(GoalsModel $goalsModel)
  {
    $this->goalsModel = $goalsModel;
  }

  public function index(): void
  {
    $goalsArray = [];
    foreach ($this->goalsModel->getGoals() as $goal) {
      $goalsArray[] = new Goals($goal);
    }

    $this->render('goals', $goalsArray);
  }

  public function add(): void
  {
    $this->render('addGoal');
  }

  public function create(string $name, string $status, int $cost): void
  {
    $name = $this->filterString($name);

    $status = $this->filterString($status);
    $errors = $this->validate($name, $status, $cost);
    if (!empty($errors)) {
      $_SESSION['errors'] = $errors;
    } else {
      if ($this->goalsModel->createGoal($name, $status, $cost)) {
        $_SESSION['success'] = 'goal created';
      }
    }
    header('location:' . Config::URL);
  }

  public function edit(int $id): void
  {
    $goal = $this->details($id);
    if (empty($goal)) {
      $this->render('404');
    } else {
      $goal = new Goals($goal);
      $this->render('editGoal', [$goal]);
    }
  }

  public function update(string $name, string $status, int $cost, int $id): void
  {
    $errors = $this->validate($name, $status, $cost);
    if (!empty($errors)) {
      $_SESSION['errors'] = $errors;
    } else {
      if ($this->goalsModel->updateGoal($name, $status, $cost, $id)) {
        $_SESSION['success'] = 'goal updated';
      }
    }
    header('location:' . Config::URL);
  }

  public function delete(int $id): void
  {
    if ($this->goalsModel->deleteGoal($id)) {
      $_SESSION['success'] = 'goal deleted';
    }
    header('location:' . Config::URL);
  }


  private function details(int $id)
  {
    return $this->goalsModel->findById($id);
  }

  private function validate(string $name, string $status, int $cost): array
  {
    $errors = [];
    if (!preg_match('/^[a-zA-Z\d_]+\s*[a-zA-Z\d_]*\s*[a-zA-Z\d_]*$/', $name)) {
      $errors['name'] = 'name is wrong';
    }

    if (!in_array($status, ['complete', 'in process', 'waiting'])) {
      $errors['status'] = 'status is wrong';
    }

    return $errors;
  }

  private function filterString(string $string): string
  {
    return filter_var($string, FILTER_SANITIZE_STRING);
  }
}