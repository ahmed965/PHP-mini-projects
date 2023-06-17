<div>
  <?= $_SESSION['success'] ?? '' ?>
</div>
<?php unset($_SESSION['success']); ?>
<form>
  <?php foreach ($goals as $goal): ?>
    <div>
      Name: <input type='text' value='<?= $goal->getName(); ?>'>
    </div>
    <div>
      status: <input type='text' value='<?= $goal->getStatus(); ?>'>
    </div>
    <div>
      Cost: <input type='text' value='<?= $goal->getCost(); ?>'>
      <a href='<?= Config::URL . '?page=edit-goal&id=' . $goal->getId() ?>'>Edit</a>
      <a href='<?= Config::URL . '?page=delete-goal&id=' . $goal->getId() ?>'
        onclick="return confirm('Are you sure?')">Delete</a>
    </div>
    <br>
  <?php endforeach ?>
  <a href='<?= Config::URL . '?page=add-goal' ?>'>Add goal </a>
  <form>
    <?php
    $title = 'goals list';