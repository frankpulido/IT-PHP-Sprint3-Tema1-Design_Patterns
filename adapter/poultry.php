<?php
declare(strict_types=1);

class Duck {
    public function quack() {
        echo "Quack \n";
    }

    public function fly() {
        echo "I'm flying \n";
    }
}

class Turkey {
    public function gobble() {
        echo "Gobble gobble \n";
    }

    public function fly() {
        echo "I'm flying a short distance \n";
    }
}

class TurkeyAdapter extends Turkey {
    public function quack() {
        $this->gobble();
    }

    public function fly() {
        for($i=1; $i<=5; $i++) {
            parent::fly();
        }
        echo PHP_EOL;
    }
}
?>