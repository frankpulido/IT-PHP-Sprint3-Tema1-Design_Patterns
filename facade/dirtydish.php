<?php
declare(strict_types=1);

class DirtyDish {
    public function pickDirtyDish(){
        return "A dish to rent has been grabbed..." . PHP_EOL;
    }
    public function removeLeftOvers() {
        return "Leftovers are dropped into the trash" . PHP_EOL;
    }
    public function soaping() : string {
        return "Soaping the dish" . PHP_EOL;
    }
    public function rinsing() : string {
        return "Rinsing dish with water" . PHP_EOL;
    }
    public function letDry() : string {
        return "The dish is drying" . PHP_EOL;
    }
    public function moveToCabinet(){
        return "The dried dish is taken to the cabinet" . PHP_EOL;
    }
    public function fallAndBreak() {
        return "Craaasssshhhh... Really George?!." . PHP_EOL;
    }
    public function feedDoggy() {
        return "Come on Scooby, dear... Leave it neat!!!...";
    }
}
?>