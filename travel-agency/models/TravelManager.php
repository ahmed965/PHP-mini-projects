<?php
require_once 'Database.php';
require_once 'TravelModel.php';

class TravelManager extends Database {

  public function getTravels(string $country, int $continent_id, string $sortingDate)
  {
    $query = "SELECT * FROM travel";

    if (!empty($country) && !empty($continent_id)) {
      $query .= " WHERE continent_id = :continent_id AND destination LIKE :destination";
    } elseif (!empty($continent_id)) {
      $query .= " WHERE continent_id = :continent_id";
    } elseif (!empty($country)) {
      $query .= " WHERE destination LIKE :destination";
    }
    if (!in_array($sortingDate, ['ASC', 'DESC'])) {
      $sortingDate = "ASC";
    }

    $query .=  " ORDER BY start_date " . $sortingDate;
    $stmt = $this->getConnection()->prepare($query);
    
    if (!empty($country)) $stmt->bindValue(':destination', '%'. $country . '%', PDO::PARAM_STR);
    if (!empty($continent_id)) $stmt->bindValue(':continent_id', $continent_id, PDO::PARAM_INT);
    //echo $query;
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'TravelModel');
    $result = $stmt->fetchAll();
    return $result;
  }

}
