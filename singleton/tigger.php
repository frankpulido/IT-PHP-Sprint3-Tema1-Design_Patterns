<?php
declare(strict_types = 1);

final class Tigger {
    private static $singletonTigger;
    //private static ?Tigger $singletonTigger = null; // CHECK THE USE OF attribute ?Class inside the same Class.
    private int $counter = 0; // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01

    private function __construct(){
        // Private constructor prevents instantiation outside the class : CHECK POKER DICE SPRINT1_EX2_01 !!!!!! (Seems it required an empty constructor)
        // https://mderis.medium.com/singleton-in-php-complete-guide-31fa96c45ac9
        // https://stackoverflow.com/questions/2396415/what-does-new-self-mean-in-php
    }

    public static function getInstance() : Tigger {
        if (!isset(self::$singletonTigger)) { // https://www.w3schools.com/php/func_var_isset.asp
            self::$singletonTigger = new self; // I should study this in depth... I can also state "= new Tigger()"
        }
        return self::$singletonTigger;
    }

    /* This method is for the declaration of attribute as "private static ?Tigger $singletonTigger = null;"
    public static function getInstance() : Tigger {
        if (self::$singletonTigger === null) {
            self::$singletonTigger = new self;
        }
        return self::$singletonTigger;
    }
    */

    public function __clone() {
        // Having it empty disables cloning. https://www.php.net/manual/en/language.oop5.cloning.php#object.clone
    }

    public function __wakeup() {
        /* Having it empty disables unserialize.
        unserialize() checks for the presence of a function with the magic name __wakeup(). If present, this function can reconstruct any resources that the object may have. 
        https://www.php.net/manual/en/language.oop5.magic.php#object.wakeup
        */
    }


    public function roar() : string { // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01
        $this->counter++;
        return "Roooaaaarrr!!!";
    }

    public function getRoarCount() : int { // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01
        return $this->counter;
    }
}

/*
DIFFERENT APPROACH MUCH MORE DIFFERENT FROM POKERDICE EXPERIMENT
https://www.youtube.com/watch?v=YMAwgRwjEOQ&t=378s
*/
?>