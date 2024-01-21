<?php
class TrainingPlanController
{
  public function __construct(
    private TrainingPlanService $trainingPlanService,
    private RequestValidation $requestValidation
  ) {
  }
  public function index(): void
  {
    echo json_encode($this->trainingPlanService->getFileDataAsArray());
  }

  public function store(): void
  {
    $requestDataArray = $_POST;
    $this->requestValidation->validate($requestDataArray);
    $this->trainingPlanService->addTrainingPlan($requestDataArray);
    echo json_encode(["success" => "true"]);
  }
}
