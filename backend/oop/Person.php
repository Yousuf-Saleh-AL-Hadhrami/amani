<?php
declare(strict_types=1);

class Person 
{

// Non-Static Properties belongs to the Object
    public int $id;
    public string $fname;
    public string $lname;
    public ?string $address = null;  // Nullable Typed Property

    // Static Propert belongs to To the class itself
    public static int $counter = 0;

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
    public function setId(int $id)
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


    public function setAddress(string|null $add)
    {
        $this->address = $add;
        return $this;
    }


     public function getAddress():string|null
    {
        return $this->address;
    }

    public function showDetails()
    {
        return
               $this->getId() . ' ' . 
               $this->getFname() . ' ' . 
               $this->getLname() . ' ' . 
               $this->getAddress() . ' ' ; 

    }

    // public function show()
    // {
    //     return $this->showDetails();
    // }


    public function __destruct()
    {
       
    }
    
    
}