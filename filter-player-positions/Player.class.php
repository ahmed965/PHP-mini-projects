<?php
class Player {
    private $name;
    private $experience;
    private $speed;
    private $isFirstLeage;
    private $post;


    public function setSpeed($speed) {
        $this->speed = $speed;
    }

   public function getpost() {
      return $this->post;
    }

    public function __construct($name, $experience, $speed, $isFirstLeage, $post) {
        $this->name = $name;
        $this->experience = $experience;
        $this->speed = $speed;
        $this->isFirstLeage = $isFirstLeage;
        $this->post = $post;
    }

    public function __toString() {
        $txt = "the player's name is " . $this->name . "<br>";
        $txt .= "the player's experience is " . $this->experience . "<br>";
        $txt .= "the player's speed is " . $this->speed . '<br>';
        $txt .= ($this->isFirstLeage) ? " play in first league " : "doesn't play in first league";
        $txt .= "<br>the player's position is " . $this->post ."<br>";
        return $txt;
    }

    public function addExperience($numberToAdd) {
        $this->experience += $numberToAdd;
    }
}
