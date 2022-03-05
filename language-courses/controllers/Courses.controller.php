<?php
require_once './models/CoursesManager.php';
require_once './models/CommentsManager.php';
require_once './helpers/helper-message.php';

class Courses {
   private $coursesManager;
   private $commentsManager;

   public function __construct() {
      $this->coursesManager = new CoursesManager();
      $this->commentsManager = new CommentsManager();
   }

   public function showCourses() {
      $comments = [];
      $courses = $this->coursesManager->getAllCourses();
      foreach($courses as $course) {
         $comments[] = $this->commentsManager->getNumberCommentsByCourse($course['id']);
      }
      require_once  './views/frontend/courses.view.php';
   }

   public function showCourseById($id) {
      if(isset($id) && $id > 0) {
         $id = htmlspecialchars($id);
         $course = $this->coursesManager->getCourseById($id);
         $comments = $this->commentsManager->getCommentsById($id);
         require_once  './views/frontend/course.view.php';
      } else {
         header('location:' . URL_ROOT);
      }
   }

   public function addCommentById($text, $author, $id) {
      if((isset($text) && !empty($text)) && (isset($author) && !empty($author)) && (isset($id) &&  0 < $id) ) {
         $text = htmlspecialchars($text);
         $author = htmlspecialchars($author);
         $id = htmlspecialchars($id);
         if(!$this->commentsManager->addCommentToDb($text ,$author, $id)) {
            throw new Exception ('can\'t add comment');
         } else {
            $mesaage ="Comment added";
            $class="success";
         }
      } else {
         $mesaage ="Please fill the fields";
         $class="danger";
      }
      header('location:'. URL_ROOT . '?action=comments/'.$id . '&mesaage=' . $mesaage . '&class=' . $class);
   }

   public function editCommentById($id) {
      $comment = $this->commentsManager->getCommentById($id);
      require_once  './views/frontend/edit.view.php';
   }

   public function editCommentValidationById($text, $author, $id_comment, $id_course) {
      if((isset($text) && !empty($text)) && 
         (isset($author) && !empty($author)) && 
         (isset($id_comment) && 0 < $id_comment) && 
         (isset($id_course) &&  0 < $id_course )) 
      {
         $text = htmlspecialchars($text);
         $author = htmlspecialchars($author);
         $id_comment = htmlspecialchars($id_comment);
         $id_course = htmlspecialchars($id_course);
         if(!$this->commentsManager->editCommentValidationById($text ,$author, $id_comment)) {
            throw new Exception ('can\'t edit comment');
         }  else {
            $mesaage ="Comment changed";
            $class="success";
         }
      } else {
         $mesaage ="Please fill the fields";
         $class="danger";
      }
      header('location:'. URL_ROOT . '?action=comments/'. $id_course . '&mesaage=' . $mesaage . '&class=' . $class);
   }

}