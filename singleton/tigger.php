<?php
declare(strict_types = 1);

final class Tigger {
    private static $singletonTigger;
    private static $counter = 0; // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01

    private function __construct(){
        // Private constructor prevents instantiation outside the class : CHECK POKER DICE SPRINT1_EX2_01 !!!!!! (Seems it required an empty constructor)
        // https://mderis.medium.com/singleton-in-php-complete-guide-31fa96c45ac9
        // https://stackoverflow.com/questions/2396415/what-does-new-self-mean-in-php
    }

    public static function getInstance() {
        if (!isset(self::$singletonTigger)) { // https://www.w3schools.com/php/func_var_isset.asp
            self::$singletonTigger = new self; // I should study this in depth
        }
        return self::$singletonTigger;
    }

    public function __clone() {
        // Having it empty disables cloning. https://www.php.net/manual/en/language.oop5.cloning.php#object.clone
    }

    public function __wakeup() {
        /* Having it empty disables unserialize.
        unserialize() checks for the presence of a function with the magic name __wakeup(). If present, this function can reconstruct any resources that the object may have. 
        https://www.php.net/manual/en/language.oop5.magic.php#object.wakeup
        */
    }

    public static function roar() : string { // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01
        self::$counter++;
        return "Roooaaaarrr!!!";
    }

    public static function getRoarCount() : int { // Same solution for PokerDice getThrowsDice and getThrowsSet SPRINT1_EX2_01
        return self::$counter;
    }
}

/*
DIFFERENT APPROACH MUCH MORE DIFFERENT FROM POKERDICE EXPERIMENT
https://www.youtube.com/watch?v=YMAwgRwjEOQ&t=378s
*/
?>