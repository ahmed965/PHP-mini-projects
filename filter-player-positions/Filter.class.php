<?php

class FilterPlayer {

    private $stricker = [];
    private $defender = [];
    private $middle = [];

    public function __construct() {}

    public function addPlayer($player) {
        if ($player->getpost() == 'stricker') {
            $this->stricker[] = $player;
        } elseif ($player->getpost() == 'defender') {
            $this->defender[] = $player;
        } elseif ($player->getpost() == 'middle') {
            $this->middle[] = $player;
        } 
    }

    public function __toString() {
        $txt = "";
        $txt .= "**********stricker**********<br>";
        for($i = 0; $i < count($this->stricker); $i++) {
            $txt .= $this->stricker[$i];
        }
        $txt .= "<br>**********defender**********<br>";
        for($i = 0; $i < count($this->defender); $i++) {
            $txt .= $this->defender[$i];
        }
        $txt .= "<br><br>**********middle**********<br>";
        for($i = 0; $i < count($this->middle); $i++) {
            $txt .= $this->middle[$i] . '<br>';
        }
        return $txt;
    }
}