<?php unset($_SESSION['success']); ?>
<form action='<?= Config::URL . '?page=save-goal' ?>' method='post'>
  <div>
    Name: <input type='text' name='name'>
    <div>
      <small>
        <?= $_SESSION['errors']['name'] ?? '' ?>
      </small>
    </div>
  </div>
  <div>
    status: <input type='text' name='status'>
    <div>
      <small>
        <?= $_SESSION['errors']['status'] ?? '' ?>
      </small>
    </div>
  </div>
  <div>
    Cost: <input type='text' name='cost'>
  </div>
  <br>
  <button type='submit'>save</button>
  <form>
    <div><a href='<?= Config::URL ?>'>Home</a></div>
    <?php
    unset($_SESSION['errors']);
    $title = 'save goal';