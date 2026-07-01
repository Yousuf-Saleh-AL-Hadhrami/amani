<?php 

require './Person.php';
require './Rule.php';
require './Certificate.php';
require './Notification.php';
require './Employee.php';
require './DailyEmployee.php';
require './Animal.php';
require './Cat.php';
require './Dog.php';




// echo $p1 = (new Person(100, "Amani","AL Nabhani","Nizwa"))
//       ->setId(200)
//       -> setAddress("Bahla")
//       ->setAddress("Sumail")
//       ->showDetails();
      
// $p2 = new Person(200 , "Yousuf","AL Hadhrami", "Izki");
// $p3 = new Person(300 , "Abdelbasit","AL Mahroqi", "Izki");


// echo Person::class;
// echo Person::AGE;
// echo Person::getCounter();

// ====================================================================================

$emp1 = new Employee(300, "Amani","AL Nabhani","Nizwa", 1616000, "Software Engineer");

//echo $emp1->getEjadaReward(["username" => "test" , "password" => "test"]);

// $mohammed = new DailyEmployee(900,"Mohammed","AL Hinai","Bahla", null ,"Accountant");
//  echo $mohammed->setDays(30)
//               ->setRate(10)
//               ->showDetails();

echo $emp1->setBasicSalary(300)
          ->setBonus(.05)
          ->setBonus(.05)
          ->setBonus(.02)
          ->setTotalSalary()
          ->deduction(.02)
          ->showDetails();



// $cat = new Cat();
// $dog = new Dog();

// $animals = [$cat , $dog];

// foreach($animals as $animal)
//     {
//         echo $animal->makeSound() . " <br>";
//     }



