<div>
  <?= $_SESSION['success'] ?? '' ?>
</div>
<?php unset($_SESSION['success']); ?>
<form action='<?= Config::URL . '?page=update-goal&id=' . $goals[0]->getId() ?>' method='post'>
  <div>
    Name: <input type='text' name='name' value='<?= $goals[0]->getName() ?>'>
    <div>
      <small>
        <?= $_SESSION['errors']['name'] ?? '' ?>
      </small>
    </div>
  </div>
  <div>
    status: <input type='text' name='status' value='<?= $goals[0]->getStatus() ?>'>
    <div>
      <small>
        <?= $_SESSION['errors']['status'] ?? '' ?>
      </small>
    </div>
  </div>
  <div>
    Cost: <input type='text' name='cost' value='<?= $goals[0]->getCost() ?>'>
  </div>
  <br>
  <button type='submit'>Update</button>
  <form>
    <div><a href='<?= Config::URL ?>'>Home</a></div>
    <?php
    unset($_SESSION['errors']);
    $title = 'update goal';