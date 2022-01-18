<?php

// Restaurant "Chez Claudio"

abstract class Employee
{
    protected string $name;
    protected string $surname;
    protected int $age;
    protected int $salary = 1000;
    protected bool $major = false;

    public function __construct($nameGiven, $surnameGiven, $ageGiven)
    {
        $this->name = $nameGiven;
        $this->surname = $surnameGiven;
        $this->salary = 1000;
        $this->setAge($ageGiven);

    }

    // METHODS

    public function introduceMyself()
    {
        echo "Hello, my name is {$this->name} and I am an employee at 'Chez Claudio'!";
    }

    // GETTERS

    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getSalary()
    {
        return $this->salary;
    }
    public function getMajor()
    {
        return $this->major;
    }

    // SETTERS

    public function setAge($newAge)
    {
        if (is_int($newAge) && $newAge >= 18)
        {
            $this->age = $newAge;
            $this->major = true;
        } else 
        {
            throw new Exception("The age must be a number above 18.");
        }
    }

}

interface Servicing
{
    public function getOrder();
}

class Commis extends Employee
{
    private string $apron;
    private string $toque;

    public function __construct($nameGiven, $surnameGiven, $ageGiven, $apronGiven, $toqueGiven)
    {
        parent::__construct($nameGiven, $surnameGiven, $ageGiven);
        $this->apron = $apronGiven;
        $this->toque = $toqueGiven;
    }

    // METHODS

    public function cookChickenFries()
    {
        echo "Yes, {$this->name} here! One chicken and fries coming up!";
    }

    // GETTERS

    public function getApron()
    {
        return $this->apron;
    }
    public function getToque()
    {
        return $this->toque;
    }
}

class Waiter extends Employee implements Servicing
{
    // METHODS

    public function sayHello()
    {
        echo "Hello, welcome to the restaurant 'Chez Claudio'!<br> My name is {$this->name}, please follow me.";
    }
    public function getOrder()
    {
        echo "Hello, I am your waitress {$this->name}. Can I take your order?";
    }
    public function serveDish(string $dishName)
    {
        echo "Here is your {$dishName}!";
    }

}

class Bartender extends Employee
{

    public function __construct($nameGiven, $surnameGiven, $ageGiven)
    {
        parent::__construct($nameGiven, $surnameGiven, $ageGiven);

        $this->salary = $this->salary + 200;
    }

    // METHODS

    public function serveWine(string $wineName)
    {
        echo "Here is the a bottle of {$wineName} you ordered.";
    }
    public function serveSparklingWater(string $sparklingWaterBrand)
    {
        echo "Here is the bottle of {$sparklingWaterBrand} you ordered.";
    }

}

class Chef extends Employee
{
    private string $apron;
    private string $chefsHat;

    public function __construct($nameGiven, $surnameGiven, $ageGiven, $apronGiven, $chefsHatGiven)
    {
        parent::__construct($nameGiven, $surnameGiven, $ageGiven);
            $this->apron = $apronGiven;
            $this->chefsHat = $chefsHatGiven;
            $this->salary = $this->salary * 2;
    }

    // METHODS

    public function cookDuckALOrange()
    {
        echo "Yes, chef {$this->name} here! One duck à l'orange coming up!";
    }

    // GETTERS

    public function getApron()
    {
        return $this->apron;
    }
    public function getChefsHat()
    {
        return $this->chefsHat;
    }
}

class Intern implements Servicing
{
    public function getOrder()
    {
        echo "Hello, I will be servicing you today. Can I take your order?";
    }
}

class Client
{
    // METHODS

    public function eat($dishName)
    {
        echo "I am eating {$dishName}.";
    }
    public function pay($dishName)
    {
        echo "I would like to pay for the {$dishName}.";
    }
    public function order($dishName, Servicing $employeesName)
    {
        echo "Hi {$employeesName->getName()}, I would like to order a {$dishName}.";
    }

}

$john = new Commis("John", "Smith", 18, "red apron", "white toque");
$john->introduceMyself();
echo "<br>";
echo "My salary is " . $john->getSalary() . "€.";
echo "<br>";
echo "I have a " . $john->getApron() . ".";
echo "<br>";
echo "I have a " . $john->getToque() . ".";
echo "<br>";
$john->cookChickenFries();
echo "<br>";
echo "<br>";

$ashley = new Bartender("Ashley", "Simpson", 24);
$ashley->introduceMyself();
echo "<br>";
echo "My salary is " . $ashley->getSalary() . "€.";
echo "<br>";
$ashley->serveSparklingWater("Perrier") . "€.";
echo "<br>";
$ashley->serveWine("red wine") . "€.";
echo "<br>";
echo "<br>";

$clementine = new Waiter("Clémentine", "Citrus", 27);
$clementine->introduceMyself();
echo "<br>";
$clementine->sayHello();
echo "<br>";
echo "My salary is " . $clementine->getSalary() . "€.";
echo "<br>";
$clementine->serveDish("chicken and fries");
echo "<br>";
echo "<br>";

$alec = new Chef("Alec", "Mystery", 23, "blue apron", "white chef's hat");
$alec->introduceMyself();
echo "<br>";
echo "My salary is " . $alec->getSalary() . "€.";
echo "<br>";
echo "I have a " . $alec->getApron() . ".";
echo "<br>";
echo "I have a " . $alec->getChefsHat() . ".";
echo "<br>";
$alec->cookDuckALOrange();
echo "<br>";
echo "<br>";

$jack = new Intern();
echo "Intern 'Jack': <br>";
$jack->getOrder();
echo "<br>";
echo "<br>";

$chaeyoung = new Client();
echo "Client 'Chaeyoung' :<br>";
$chaeyoung->order("chicken and fries", $clementine);
echo "<br>";
$chaeyoung->eat("chicken and fries");
echo "<br>";
$chaeyoung->pay("chicken and fries");
echo "<br>";

?>