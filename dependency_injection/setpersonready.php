<?php
declare(strict_types=1);
require_once "place.php";

interface SetPersonReady {
    public function grabEverywhere();
    public function grabToSchool();
    public function grabToWork();
    public function toString();
}
?>
