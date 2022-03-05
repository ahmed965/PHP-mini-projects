<?php
require_once 'Database.php';

class CoursesManager extends Database {

  public function getAllCourses() {
    $sql = 'SELECT * FROM courses';
    $statement = Database::getConnection()->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCourseById($id) {
    $sql = 'SELECT * FROM courses WHERE id = :id';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':id',$id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

}