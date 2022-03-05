<?php 
  ob_start();
  ?>  
<a href="<?= URL_ROOT ?>" class="btn btn-primary">Back to courses</a>
<h2 class="mt-3">Edit Comment</h2>
<div class="bg-light text-dark p-2 border rounded">
  <form method="post" action="<?= URL_ROOT ?>?action=editCommentValidation/<?= $comment["id"]; ?>">
    <div clas="row">
      <div class="mb-3 col-sm-12 col-lg-4">
        <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="<?= $comment['author'] ?>">
      </div>
      <div class="col-12 mb-3">
        <textarea class="form-control" id="text"  name="text" rows="3" placeholder ="Comment"><?= $comment['text'] ?></textarea>
      </div>
      <div class="col-12 mb-3 text-end">
        <button type="submit" class="btn btn-primary" id="btnComment">Validation</button>
      </div>
    </div>
    <input type="hidden" class="form-control" id="course_id" name="course_id"  value="<?= $comment['id_course'] ?>" />
  </form>
</div>
<?php
$content = ob_get_clean();
$title ="Edit course";
require_once './views/frontend/commons/template.php';