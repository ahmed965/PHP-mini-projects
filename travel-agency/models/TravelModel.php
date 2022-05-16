<?php

class TravelModel {

  private $destination;
  private $start_date;
  private $image;
  private $price;
  private $duration;

  public function getDetination() 
  {
    return $this->destination;
  }

  public function getImage() 
  {
    return $this->image;
  }

  public function getStart_date() 
  {
    return $this->start_date;
  }

  public function getPrice() 
  {
    return $this->price;
  }

  public function getDuration() 
  {
    return $this->duration;
  }

}