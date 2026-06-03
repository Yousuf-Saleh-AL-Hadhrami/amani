<?php 

$name = "Amani";
$employee_id = 1000;
$salary = 300.50;
$active = true;
$hobbies = ["Programming","Reading","Writing"];
$employed_at = NULL;

class Person
{
    public $name;
    public $age;
    public $address;

    public function __construct($n , $ag , $add)
    {
        $this->name = $n;
        $this->age = $ag;
        $this->address = $add;
    }

    public function setName($n)
    {
       $this->name;
    }
}


$ahmed = new Person("Ahmed Salim",30,"Nizwa");

echo gettype($name);
/*
 - is_integer() , is_numeric() , is_float() , etc 

*/