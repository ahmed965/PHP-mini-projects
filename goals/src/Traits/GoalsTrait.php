<?php

trait GoalsTrait
{
 public function render(string $view, array $goals = []): void
 {
  ob_start();
  require_once dirname(__DIR__, 2). '/Views/'. $view .'View.php';
  $content = ob_get_clean();
  require_once dirname(__DIR__, 2). '/Views/template.php';
 }
} 