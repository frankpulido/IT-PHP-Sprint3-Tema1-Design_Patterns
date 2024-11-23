<?php
declare(strict_types=1);
require_once "place.php";
require_once "grabeverything.php";

/*
Dependency injection is about inserting one class into another.
It can be done through a constructor (hard dependency), through a setup function (soft dependency) or through a "instructor" (?).
*/

class PersonReadyToLeaveHome {
    protected string $name;
    protected Place $somewhere;
    protected SetPersonReady $mystuff;

    public function __construct(string $name, Place $somewhere, SetPersonReady $mystuff)
    {
        $this->name = $name;
        $this->somewhere = $somewhere;
        $this->mystuff = $mystuff;
        $this->getReady(); // sets up attribute $mystuff to "everything (all dependencies) = true"
    }

    public function getReady() {
        $this->mystuff->grabEverything();
        /*
        Next :
        if($this instanceof Worker){$this->mystuff->grabEverythingWorker();}
        elseif(self() instanceof Student){$this->mystuff->grabEverythingStudent();}
        else{$this->mystuff->grabCommonStuffEveryoneHas();} (cellphone, homekeys)
        Worker and Student will be CHILD of PersonReadyToLeaveHome and will have additional methods
        */
    }
    
    public function headSomewhere() : string {
        return "I am $this->name and I got ready to go to " . $this->somewhere->name;
    }
}
?>