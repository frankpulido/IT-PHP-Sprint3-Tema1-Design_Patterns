<?php
declare(strict_types=1);
require "setpersonready.php";

// I could have done different implementations for Class SetPersonReady according to the CHILD classes of a PERSON parent class. Person could be the abstract parent of Student and Worker classes"...

class Everything implements SetPersonReady {
    protected bool $wallet = false;
    protected bool $homekeys = false;
    protected bool $carkeys = false;
    protected bool $cellphone = false;
    // I could add specific attributes for different CHILD classes : books, public transport card, office keys, university id, etc.

    public function grabEverything()
    {
        $this->wallet = true;
        $this->homekeys = true;
        $this->carkeys = true;
        $this->cellphone = true;
    }
    /*
    There could be 2 functions, grabEverythingStudent() and grabEverythingWorker()
    This 2 functions could set "true" different attributes of the Everything class. The Worker needs car keys and office keys and the Student needs the public transport card and the books
    */
}
?>