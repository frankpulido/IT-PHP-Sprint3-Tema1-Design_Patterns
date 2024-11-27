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

class TurkeyAdapter { // class Adapter should encapsulate raher that inherit the original class

    private Turkey $turkey;

    public function __construct (Turkey $turkey) {
        $this->turkey = $turkey;
    }
    public function quack() {
        $this->turkey->gobble();
    }

    public function fly() {
        for($i=1; $i<=5; $i++) {
            $this->turkey->fly();
        }
        echo PHP_EOL;
    }
}
?>