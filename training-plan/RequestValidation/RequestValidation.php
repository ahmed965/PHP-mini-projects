<?php

class RequestValidation
{
  private const TIMES_PER_WEEK = "times-per-week";
  private const LEVEL = "level";
  private const GOAL = "goal";
  private const STARTED_AT = "started-at";
  private const FINISHED_AT = "finished-at";

  public function validate(array $requestArray): void
  {
    $this->validateNumberOfTimesPerWeek($requestArray[self::TIMES_PER_WEEK]);
    $this->validateString($requestArray[self::LEVEL]);
    $this->validateString($requestArray[self::GOAL]);
    $this->validateDate($requestArray[self::STARTED_AT]);
    $this->validateDate($requestArray[self::FINISHED_AT]);
  }

  private function validateNumberOfTimesPerWeek(int $numberOfTimesPerWeek): void
  {
    if (!preg_match('/\d{1}/', $numberOfTimesPerWeek)) {
      throw new Exception(self::TIMES_PER_WEEK . 'is invalid', 400);
    }
  }
  private function validateString(string $string): void
  {
    if (!preg_match('/^[a-zA-Z]+$/', $string) || strlen($string) < 3) {
      throw new Exception($string . 'is invalid', 400);
    }
  }

  private function validateDate(string $date): void
  {
    if (!preg_match('/\d{4}-\d{2}-\d{2}/', $date)) {
      throw new Exception('date is invalid', 400);
    }
  }
}
