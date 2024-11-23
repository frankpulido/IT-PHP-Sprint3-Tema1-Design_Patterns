<?php
declare(strict_types=1);
require "personreadytoleavehome.php";

$mystuffOtto = new Everything();
$mystuffMother = new Everything();

$person_student = new PersonReadyToLeaveHome ("Otto", Place::School, $mystuffOtto);
$person_worker = new PersonReadyToLeaveHome("Otto's mother", Place::Work, $mystuffMother);

echo PHP_EOL;
echo $person_student->headSomewhere() . PHP_EOL;
echo PHP_EOL;
echo $person_worker->headSomewhere(). PHP_EOL;
echo PHP_EOL;
?>