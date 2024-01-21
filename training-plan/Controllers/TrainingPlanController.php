<?php
class TrainingPlanController
{
  public function __construct(
    private TrainingPlanService $trainingPlanService,
    private RequestValidation $requestValidation,
    private array $requestDataArray
  ) {
  }
  public function index(): void
  {
    echo json_encode($this->trainingPlanService->getFileDataAsArray());
  }

  public function store(): void
  {
    $this->requestValidation->validate($this->requestDataArray);
    $this->trainingPlanService->addTrainingPlan($this->requestDataArray);
    http_response_code(201);
    echo json_encode(["success" => "true"]);
  }
  public function show(int $id): void
  {
    echo json_encode($this->trainingPlanService->findByIdOrFail($id));
  }

  public function update(int $id): void
  {
  }
}
