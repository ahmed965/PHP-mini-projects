<?php
require_once 'Database.php';

class CommentsManager {

  public function getCommentsById($id) {
    $sql = 'SELECT * FROM comments WHERE id_course = :id ORDER BY date';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addCommentToDb($text, $author, $id) {
    $sql = 'INSERT INTO comments (text, author, id_course) VALUES (:text, :author, :id)';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':text', $text, PDO::PARAM_STR);
    $statement->bindValue(':author', $author, PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    return $statement->execute();
  }

  public function getNumberCommentsByCourse($id) {
    $sql = 'SELECT COUNT(id) as numberComments FROM comments WHERE id_course = :id';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);
    $statement->execute();
    $numberComments = $statement->fetch(PDO::FETCH_ASSOC);
    return $numberComments['numberComments'];
  }

  public function getCommentById($id) {
    $sql = 'SELECT * FROM comments WHERE id = :id';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function editCommentValidationById($text, $author, $id) {
    $sql = 'UPDATE comments SET text = :text, author = :author WHERE id = :id';
    $statement = Database::getConnection()->prepare($sql);
    $statement->bindValue(':text', $text, PDO::PARAM_STR);
    $statement->bindValue(':author', $author, PDO::PARAM_STR);
    $statement->bindValue(':id',$id,PDO::PARAM_INT);
    return $statement->execute(); 
  }

}