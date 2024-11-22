<?php
// The example here is very clarifying : https://refactoring.guru/design-patterns/adapter
declare(strict_types=1);
require "poultry.php";

function duck_interaction($duck) {
    $duck->quack();
    $duck->fly();
}

$duck = new Duck;
$turkey = new Turkey;
$turkey_adapter = new TurkeyAdapter($turkey);

echo "The Turkey says..." . PHP_EOL;
$turkey->gobble();
$turkey->fly();
echo PHP_EOL;

echo "The Duck says..." . PHP_EOL;
duck_interaction($duck);
echo PHP_EOL;

echo "The TurkeyAdapter says..." . PHP_EOL;
duck_interaction($turkey_adapter);
echo PHP_EOL;
?>