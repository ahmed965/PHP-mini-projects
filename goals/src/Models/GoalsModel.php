<?php

require 'Database.php';

class GoalsModel
{
 
  public function getGoals(): array
  {
    $statement = Database::getConnection()->query('select * from goals');
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

public function createGoal(string $name, string $status, int $cost): bool
{
 $query = 'insert into goals(name, status, cost) values (:name, :status, :cost)';
 $statement = Database::getConnection()->prepare($query);
 return $statement->execute([
    ':name' => $name,
    ':status' => $status,
    ':cost' => $cost
  ]);
 }
  public function findById($id): array
  {
    $statement = Database::getConnection()->prepare('select * from goals where id = :id');
    $statement->execute([':id' => $id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
     return $result === false ? [] : $result;
  }

  public function updateGoal(string $name, string $status, int $cost, int $id)
  {
    $query = 'update goals set
                 name = :name, 
                 status = :status,
                 cost = :cost
              where id = :id';
    $statement = Database::getConnection()->prepare($query);
    return $statement->execute([
      ':name' => $name,
      ':status' => $status,
      ':cost' => $cost,
       ':id' => $id
    ]);
  }

  public function deleteGoal(int $id): bool
  {
     $statement = Database::getConnection()->prepare('delete from goals where id = :id');
     return $statement->execute([':id' => $id]);
  }
}