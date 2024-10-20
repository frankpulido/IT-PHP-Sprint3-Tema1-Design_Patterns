<?php
declare(strict_types=1);
require "tigger.php";

// $tigger = new Tigger(); La clase está "cerrada" con el constructor vacío. Si intentamos crear una instancia la ejecución del programa peta.

/*
https://mderis.medium.com/singleton-in-php-complete-guide-31fa96c45ac9
"To use the Singleton class, we simply call the getInstance() method, which returns the SAME INSTANCE of the class every time it is called"
Tigger::getInstance() : Cómo se dice anteriormente, esta instrucción funciona, pero no necesito la instancia, sólo ejecutar sus métodos.
*/

$choice = -1;

do {
    echo PHP_EOL;
    echo "Welcome to Winny the Pooh characters :" . PHP_EOL . "1. Make Tigger Roar." . PHP_EOL . "2. Print ROAR count." . PHP_EOL . "0. Exit." . PHP_EOL;
    echo PHP_EOL;
    $choice = (int) readline("Your choice : ");
    switch($choice){
        case 0 :
            echo "See you later, alligator!!!";
            break;
        case 1 :
            echo Tigger::roar();
            break;
        case 2 :
            echo "The real and ONLY Tigger has roared " . Tigger::getRoarCount() . " times!!!...";
            break;
        default :
            echo "You must select a valid option (either 0, 1, 2)";
    }
    echo PHP_EOL;
} while ($choice != 0);
?>