<?php

class Goals
{
  private $id;
  private $name;
  private $status;
  private $cost;


  public function __construct(array $goalsArray)
  {
    $this->id = $goalsArray['id'];
    $this->name = $goalsArray['name'];
    $this->status = $goalsArray['status'];
    $this->cost = $goalsArray['cost'];
  }


  public function getId(): int
  {
    return $this->id;
  }
  public function getName(): string
  {
    return $this->name;
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  public function getCost(): int
  {
    return $this->cost;
  }
}
?>