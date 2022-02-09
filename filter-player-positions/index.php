<?php 
require_once 'PLayer.class.php';
require_once 'Filter.class.php';

$player1 = new Player('lolo', 5, 'fast', false, 'stricker');
$player2 = new Player('lili', 10, 'so fast', true, 'defender');
$player3 = new Player('lala', 9, 'fast', false, 'middle');
$player4 = new Player('lulu', 9, 'so fast', true, 'middle');

$player2->setSpeed('medium speed');
$player3->addExperience(3);

$filterPlayer = new FilterPlayer();

$players = [$player1, $player2, $player3, $player4];
for ($i =0; $i < count($players); $i++) {
  $filterPlayer->addPlayer($players[$i]);
}

echo $filterPlayer;
