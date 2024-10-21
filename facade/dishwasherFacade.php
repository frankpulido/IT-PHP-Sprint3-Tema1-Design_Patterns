<?php
declare(strict_types=1);
require "dirtydish.php";

class DishwasherFacade {
    protected array $dirtydishes = []; // If I don't initialize the code doesn't run
    public function __construct(array $dirtydishes){
        $this->initDishwasher($dirtydishes); // An invention to filter elements which are not of class DirtyDish.
    }

    public function initDishwasher($dirtydishes) {
        foreach($dirtydishes as $dirtydish) {
            $init = [];
            if($dirtydish instanceof DirtyDish){$init[] = $dirtydish;}
        }
        $this->dirtydishes = $init;
    }

    public function startDishWashingMachine() {
        foreach ($this->dirtydishes as $dirtydish) {
            $dirtydish->soaping();
            $dirtydish->rinsing();
            $dirtydish->letDry();
        }
    }
}
?>