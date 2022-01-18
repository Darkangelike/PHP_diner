<?php

// Restaurant "Chez Claudio"

abstract class Worker
{
    public string $name;
    public string $surname;
    protected bool $major;
    protected int $age;
    protected int $income;

    public function __construct($nameGiven, $surnameGiven, $ageGiven)
    {
        $this->name = $nameGiven;
        $this->surname = $surnameGiven;
        $this->age = $ageGiven;
        $this->income = 1000;
        $this->major = false;

        if (is_int($ageGiven) && $ageGiven >= 18)
        {
            $this->major = true;
        }

    }
}

class Commis extends Worker
{
    private string $apron;
    private string $toque;

    public function __construct($nameGiven, $surnameGiven, $ageGiven)
    {
        parent::__construct($nameGiven, $surnameGiven, $ageGiven);
    }

    function cookChickenFries()
    {

    }
}

class Waiter extends Worker
{

}
class Barman extends Worker
{

}
class Chief extends Worker
{

}

class Intern
{

}

class Patron
{

}

$john = new Waiter("John", "Smith", 18);
var_dump($john);

?>