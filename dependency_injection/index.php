<?php
declare(strict_types=1);
require "personreadytoleavehome.php";

$person1 = new PersonReadyToLeaveHome ("Otto", Place::School);
$person2 = new PersonReadyToLeaveHome("Otto's mother", Place::Work);

echo PHP_EOL;
echo $person1->headSomewhere() . PHP_EOL;
echo PHP_EOL;
echo $person2->headSomewhere(). PHP_EOL;
echo PHP_EOL;

?>