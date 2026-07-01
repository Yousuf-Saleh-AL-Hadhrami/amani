<?php 

require './Person.php';
require './Employee.php';


// echo $p1 = (new Person(100, "Amani","AL Nabhani","Nizwa"))
//        ->setId(200)
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

echo $emp1->setBasicSalary(300)
          ->setBonus(.05)
          ->setTotalSalary()
          ->deduction(.02)
          ->getTotalSalary();