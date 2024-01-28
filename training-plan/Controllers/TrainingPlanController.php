<?php
class TrainingPlanController
{
  private const MESSGE = 'message';
  public function __construct(
    private TrainingPlanService $trainingPlanService,
    private RequestValidation $requestValidation,
    private array $requestDataArray
  ) {
  }
  public function index(): void
  {
    echo json_encode($this->trainingPlanService->getJsonDataToArray());
  }

  public function store(): void
  {
    $this->requestValidation->validate($this->requestDataArray);
    $this->trainingPlanService->addTrainingPlan($this->requestDataArray);
    http_response_code(201);
    echo json_encode([self::MESSGE => 'training plan is successfully created']);
  }
  public function show(int $id): void
  {
    echo json_encode($this->trainingPlanService->findByIdOrFail($id));
  }

  public function update(int $id): void
  {
    $this->requestValidation->validate($this->requestDataArray);
    $this->trainingPlanService->updateTrainigPlan($id, $this->requestDataArray);

    echo json_encode([
      self::MESSGE => 'training plan with id ' . $id .
        ' is successfully updated'
    ]);
  }
  public function destroy(int $id): void
  {
    $this->trainingPlanService->deleteTrainingPlan($id);
    echo json_encode([
      self::MESSGE => 'training plan with id ' . $id .
        ' is successfully deleted'
    ]);
  }
}
