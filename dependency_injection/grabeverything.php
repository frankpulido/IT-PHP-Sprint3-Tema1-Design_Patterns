<?php
declare(strict_types=1);
require "setpersonready.php";

class Everything implements SetPersonReady {
    protected bool $wallet = false;
    protected bool $homekeys = false;
    protected bool $cellphone = false;
    protected bool $carkeys = false;
    protected bool $laptop = false;
    protected bool $buspass = false;
    protected bool $books = false;

    public function grabEverywhere()
    {
        $this->wallet = true;
        $this->homekeys = true;
        $this->cellphone = true;
    }

    public function grabToSchool()
    {
        $this->books = true;
        $this->buspass = true;
    }

    public function grabToWork()
    {
        $this->laptop = true;
        $this->carkeys = true;
    }

    public function toString(): string
    {
        $items = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($value === true) {
                $items[] = $key;
            }
        }
        return implode(', ', $items);
    }
}
?>