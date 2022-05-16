<?php ob_start(); ?>
<h1>Travel agency</h1>
<form action="">
  <div class="row">
    <div class="col-md-6">
      <h3>Search your destination country</h3>
      <div class="form-group">
        <input class="form-control mb-2" type="text" placeholder="search destination" name="q" value="<?= htmlentities($country) ?>">
      </div>
    </div>
    <div class="col-md-6">
      <h3>Search by continent</h3>
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="continent" onchange="submit()">
          <option value="0" selected>Choose continent</option>
          <?php foreach ($continents as $continent): ?>
            <option value="<?= $continent->getId(); ?>" <?= $continent_id == $continent->getId() ? 'selected' : '' ?>> <?= $continent->getName(); ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <h3>Sort by date travel</h3>
      <div class="form-group">
        <select class="form-select" aria-label="Default select example" name="date" onchange="submit()">
          <option value="">Choose sorting travels</option>
          <option value="ASC" <?= $sortingDate == "ASC" ? 'selected' : '' ?>>Earliest</option>
          <option value="DESC" <?= $sortingDate == "DESC" ? 'selected' : '' ?>>Most recent</option>
        </select>
      </div>
    </div>
  </div>
   <button class="btn btn-primary mt-2" type="submit">Search</button>
</form>
<hr class="border-2">
<div class="row mt-3">
  <?php foreach ($travels as $travel): ?>
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?= $travel->getImage() ?>" class="img-fluid rounded-start" alt="Travel image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Visit <?= $travel->getDetination() ?></h5>
              <p class="card-text">From <?= $travel->getPrice()?> €</p>
              <p class="card-text"><?= $travel->getStart_date() ?></p>
              <p class="card-text"><strong><?= $travel->getDuration() ?></strong> nights</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
<?php 
  $content = ob_get_clean(); 
  $titel = 'Home';
  ?>
<?php require_once 'layout.view.php'; ?>

