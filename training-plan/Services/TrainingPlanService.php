<?php

class TrainingPlanService
{
  public function __construct(private string $file)
  {
  }

  public function addTrainingPlan(array $requestDataArray): void
  {
    $trainingPlanArray = $this->getFileDataAsArray();
    $requestDataArray = array_merge(
      ['id' => $this->incrementId($trainingPlanArray)],
      $requestDataArray
    );
    $trainingPlanArray[] = $requestDataArray;
    $this->addPlanInJsonFile($trainingPlanArray);
  }

  public function getFileDataAsArray(): array
  {
    return json_decode(file_get_contents($this->file), true);
  }
  private function incrementId(array $trainingPlanArray): int
  {
    return end($trainingPlanArray)['id'] + 1;
  }

  private function addPlanInJsonFile(array $trainingPlanArray): void
  {
    file_put_contents($this->file, json_encode($trainingPlanArray));
  }
}