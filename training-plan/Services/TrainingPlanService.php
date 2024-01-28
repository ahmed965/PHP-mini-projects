<?php

class TrainingPlanService
{
  private const ID = 'id';

  public function __construct(private string $file, private array $jsonDataToArray)
  {
  }

  public function getJsonDataToArray(): array
  {
    return $this->jsonDataToArray;
  }

  public function addTrainingPlan(array $requestDataArray): void
  {
    $requestDataArray = array_merge(
      [self::ID => $this->incrementId($this->jsonDataToArray)],
      $requestDataArray
    );
    $this->jsonDataToArray[] = $requestDataArray;
    $this->saveTrainingPlansInJson($this->jsonDataToArray);
  }

  public function findByIdOrFail(int $id): array
  {
    foreach ($this->jsonDataToArray as $trainingPlanArray) {
      if ($trainingPlanArray[self::ID] === $id) {
        return $trainingPlanArray;
      }
    }
    http_response_code(404);
    throw new Exception('training plan with id ' . $id . ' is not found');
  }

  private function incrementId(array $trainingPlanArray): int
  {
    return end($trainingPlanArray)[self::ID] + 1;
  }

  private function saveTrainingPlansInJson(array $trainingPlanArray): void
  {
    file_put_contents($this->file, json_encode($trainingPlanArray));
  }

  public function updateTrainigPlan(int $id, array $requestDataArray): void
  {
    $this->findByIdOrFail($id);
    foreach ($this->jsonDataToArray as &$trainingPlanArray) {
      if ($trainingPlanArray[self::ID] === $id) {
        foreach ($trainingPlanArray as $key => $value) {
          if ($key === self::ID) {
            continue;
          }
          if ($trainingPlanArray[$key] !== $requestDataArray[$key]) {
            $trainingPlanArray[$key] = $requestDataArray[$key];
          }
        }
      }
    }

    $this->saveTrainingPlansInJson($this->jsonDataToArray);
  }
  public function deleteTrainingPlan(int $id): void
  {
    $this->findByIdOrFail($id);
    array_splice($this->jsonDataToArray, $id - 1, 1);
    $this->saveTrainingPlansInJson($this->jsonDataToArray);
  }
}