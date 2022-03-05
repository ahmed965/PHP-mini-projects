<?php
function showMessages($message, $class) {
  echo '<div class="alert alert-' . $class . '" role="alert">';
    echo $message;
  echo '</div>';
}


