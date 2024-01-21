<?php

class TrainingPlanService
{
  private const ID = 'id';
  public function __construct(private string $file)
  {
  }

  public function addTrainingPlan(array $requestDataArray): void
  {
    $trainingPlanArray = $this->getFileDataAsArray();
    $requestDataArray = array_merge(
      [self::ID => $this->incrementId($trainingPlanArray)],
      $requestDataArray
    );
    $trainingPlanArray[] = $requestDataArray;
    $this->addTrainingPlanInJsonFile($trainingPlanArray);
  }

  public function findByIdOrFail(int $id): array
  {
    foreach ($this->getFileDataAsArray() as $trainingPlanArray) {
      if ($trainingPlanArray[self::ID] === $id) {
        return $trainingPlanArray;
      }
    }
    http_response_code(404);
    throw new Exception('training plan with id ' . $id . ' is not found');
  }

  public function getFileDataAsArray(): array
  {
    return json_decode(file_get_contents($this->file), true);
  }
  private function incrementId(array $trainingPlanArray): int
  {
    return end($trainingPlanArray)[self::ID] + 1;
  }

  private function addTrainingPlanInJsonFile(array $trainingPlanArray): void
  {
    file_put_contents($this->file, json_encode($trainingPlanArray));
  }
}