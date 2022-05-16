<?php
require_once '.\models\TravelManager.php';
require_once '.\models\ContinentManager.php';

class TravelController {
  private $travelManager;
  private $continentManager;

  public function __construct() 
  {
    $this->travelManager = new TravelManager();
    $this->continentManager = new ContinentManager();
  }
 
  private function showAllContinents() 
  {
    return $this->continentManager->getAllContinents();
  }

  public function showHomePage(string $country, int $continent_id, string $sortingDate) 
  {
    $travels = $this->travelManager->getTravels($country, $continent_id, $sortingDate);
    $continents = $this->showAllContinents();
    require_once '.\views\home.view.php';
  }

}