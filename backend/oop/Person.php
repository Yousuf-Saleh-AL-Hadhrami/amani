<?php

class Person 
{

// Non-Static Properties belongs to the Object
    public $id;
    public $fname;
    public $lname;
    public $address;

    // Static Propert belongs to To the class itself
    public static $counter = 0;

    // Constant Belongs to The class
    public const AGE = 18;


    public function __construct(int $id , string $fn , string $ln , string $add)
    {
            $this->id = $id;
            $this->fname = $fn;
            $this->lname = $ln;
            $this->address = $add;


            // echo " Object is created <br>";
            self::$counter++;
    }


    // Static Method belongs to The Class
    public static function getCounter():int
    {
         return self::$counter;
    }

    // Non-Static Methods Blongs to the object
    public function setId(int $id):Person
    {
        $this->id = $id;

        return $this;
    }

    public function getId():int 
    {
        return $this->id;

    }
    public function setFname(string $fn):Person
    {
        $this->fname = $fn;
        return $this;
    }

     public function setLname(string $ln):Person
    {
        $this->lname = $ln;

        return $this;
    }


    public function getFname():string 
    {
        return $this->fname;
    }


    public function getLname():string 
    {
        return $this->lname;
    }


    public function fullName()
    {
        return $this->getFname() . ' ' . $this->getLname();
    }


    public function setAddress(string $add)
    {
        $this->address = $add;
        return $this;
    }


     public function getAddress():string 
    {
        return $this->address;
    }

    public function showPersonDetails()
    {
        return
               $this->getId() . ' ' . 
               $this->getFname() . ' ' . 
               $this->getLname() . ' ' . 
               $this->getAddress() . ' ' ; 


    }


    public function __destruct()
    {
       
    }
    
    
}