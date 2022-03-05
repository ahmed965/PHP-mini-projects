<?php
  ob_start();
  ?>
<?php 
  if (isset($_GET['mesaage']) && isset($_GET['class'])) {
    showMessages($_GET['mesaage'], $_GET['class']);
  }
  ?>
<h1 class="mb-3">Detail Course</h1>
<a href="<?= URL_ROOT ?>" class="btn btn-primary">Back to courses</a>
<div class='row mt-3'>
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="row">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $course['titel'] ?></h5>
            <h6><?= $course['start_date']  ?></h6>
            <p class="card-text"><?= $course['description'] ?>.</p>
            <p class="card-text"><strong>Price: </strong><?= $course['price'] ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="<?= $course['image']; ?>" class="rounded-start w-100" alt="course image" style="height:300px;">
        </div>
      </div>
    </div>
  </div>
</div>
<h2 class="mt-3">Comments</h2>
<?php foreach($comments as $comment) : ?>
<div class="bg-light text-dark p-2 border rounded d-flex justify-content-between align-item-center">
  <div>
    <p class="mb-0"><strong><?= $comment['author'] ?>: </strong><small><?= $comment['date'] ?></small></p>
    <p><?= $comment['text']?></p>
  </div>
  <div>
    <a href="<?= URL_ROOT ?>?action=editComment/<?= $comment['id'] ?>" class="btn btn-dark">Edit</a>
  </div>
</div>
<?php endforeach; ?>
<h2 class="mt-3">Add Comment</h2>
<div class="bg-light text-dark p-2 border rounded">
  <form method="post" action="<?= URL_ROOT ?>?action=addComment/<?= $course["id"]; ?>">
    <div clas="row">
      <div class="mb-3 col-sm-12 col-lg-4">
        <input type="text" class="form-control" id="author" name="author" placeholder="Author">
      </div>
      <div class="col-12 mb-3">
        <textarea class="form-control" id="text"  name="text" rows="3" placeholder ="Add comment" ></textarea>
      </div>
      <div class="col-12 mb-3 text-end">
        <button type="submit" class="btn btn-primary" id="btnComment" disabled>Add Comment</button>
      </div>
    <div>
  </form>
</div>
<?php
  $content = ob_get_clean();
  $title ="Comments";
  require_once  './views/frontend/commons/template.php';
  ?>