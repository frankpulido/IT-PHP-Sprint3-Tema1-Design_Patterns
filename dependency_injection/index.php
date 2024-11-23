<?php
declare(strict_types=1);
require "personreadytoleavehome.php";

$mystuff = new Everything();
$person_student = new PersonReadyToLeaveHome ("Otto", Place::School, $mystuff);
$person_worker = new PersonReadyToLeaveHome("Otto's mother", Place::Work, $mystuff);

echo PHP_EOL;
echo $person_student->headSomewhere() . PHP_EOL;
echo PHP_EOL;
echo $person_worker->headSomewhere(). PHP_EOL;
echo PHP_EOL;

?>