<?php
declare(strict_types=1);
require "setpersonready.php";

// I could have done different implementations for Class SetPersonReady according to the CHILD classes of a PersonReadyToLeaveHome PARENT class. Person could be the abstract parent of Student and Worker classes"... Dataprovider is a collection of Person objects in a Home, we don't know beforehand what we are going to receive from each Home.

class Everything implements SetPersonReady {
    protected bool $wallet = false;
    protected bool $homekeys = false;
    protected bool $carkeys = false;
    protected bool $cellphone = false;
    // I could add specific attributes for different CHILD classes : books, public transport card, office keys, etc.

    public function grabEverything()
    {
        $this->wallet = true;
        $this->homekeys = true;
        $this->carkeys = true;
        $this->cellphone = true;
    }
    /*
    There could be 3 functions, grabCommonStuffEveryoneHas, grabEverythingStudent() and grabEverythingWorker()
    This 3 functions could set "true" different attributes of the Everything class. The Worker needs car keys and office keys and the Student needs the public transport card and the books
    Common shit : wallet, homekeys, cellphone
    Student : public transport card, books. (to say anything)
    Worker : vehicle keys, office keys. (to say anything)
    */
}
?>