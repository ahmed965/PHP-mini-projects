<?php
ob_start();
echo '<p>' .  $message . '</p>';
$content = ob_get_clean();
$title = 'Error';
require_once  './views/frontend/commons/template.php';