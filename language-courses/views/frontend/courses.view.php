<?php
  ob_start();
  ?>
<h1 class="mb-4">This our languages list courses </h1>
<div class='row'>
  <?php foreach ($courses as $index => $course) : ?>
  <div class="col-md-6">
    <div class="card mb-3">
      <div class="row">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $course['titel'] ?></h5>
            <h6><?= $course['start_date']; ?></h6>
            <p class="card-text"><?= $course['description'] ?>.</p>
            <p class="card-text"><strong>Price: </strong><?= $course['price'] ?></p>
            <p class="card-text"><strong><a href="?action=comments/<?= $course['id'] ?>">Comments: </a><?= $comments[$index]; ?></strong></p>
          </div>
        </div>
        <div class="col-md-4">
          <img src="<?= $course['image'] ?>" class="img-fluid rounded-start" alt="...">
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php
  $content = ob_get_clean();
  $title = "Courses";
  require_once  './views/frontend/commons/template.php';
  ?>