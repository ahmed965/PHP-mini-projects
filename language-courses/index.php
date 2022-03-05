<?php
require_once './controllers./Courses.controller.php';
$Courses = new Courses;
try {
    if(empty($_GET['action'])) {
        $Courses->showCourses();
    } else {
        $url = filter_var($_GET['action'], FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        if($url[0] == "comments") {
            $Courses->showCourseById($url[1]);
        } elseif ($url[0] == "addComment") {
            $Courses->addCommentById($_POST['text'], $_POST['author'], $url[1]);
        } elseif ($url[0] == "editComment") {
            $Courses->editCommentById($url[1]);
        } elseif ($url[0] == "editCommentValidation") {
            $Courses->editCommentValidationById($_POST['text'], $_POST['author'], $url[1], $_POST['course_id']);
        } else {
            throw new Exception('Page doesn\'t  exist');
        }
    }
}
catch(Exception $e) {
    $message = $e->getMessage();
    require_once './views/frontend/error.view.php';
}