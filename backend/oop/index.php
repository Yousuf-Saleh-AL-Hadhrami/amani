<?php 

// require './Identity.php';
// require './Person.php';
// require './Rule.php';
// require './Certificate.php';
// require './Notification.php';
// require './Employee.php';
// require './DailyEmployee.php';
// require './Animal.php';
// require './Cat.php';
// require './Dog.php';


require './vendor/autoload.php';

use App\Identity;
use App\Person\Person;
use Carbon\Carbon;
use YousufAlhadhrami\Math\Calculator;



$identity = new Identity;
$identity->setIdentity(123456);


$identity2 = new Identity;
$identity2->setIdentity(6574646546);


// echo $p1 = (new Person(100, "Amani","AL Nabhani","Nizwa", $identity))
//        ->setId(200)
//       -> setAddress("Bahla")
//       ->setAddress("Sumail")
//       ->showDetails();

//       echo "<br>";

// echo $p2 = (new Person(200, "Yousuf","AL Hadhrami","Izki", $identity2))
//           ->showDetails();
      
// $p2 = new Person(200 , "Yousuf","AL Hadhrami", "Izki");
// $p3 = new Person(300 , "Abdelbasit","AL Mahroqi", "Izki");


// echo Person::class;
// echo Person::AGE;
// echo Person::getCounter();

// ====================================================================================

//$emp1 = new Employee(300, "Amani","AL Nabhani","Nizwa", 1616000, "Software Engineer");

//echo $emp1->getEjadaReward(["username" => "test" , "password" => "test"]);

// $mohammed = new DailyEmployee(900,"Mohammed","AL Hinai","Bahla", null ,"Accountant");
//  echo $mohammed->setDays(30)
//               ->setRate(10)
//               ->showDetails();

// echo $emp1->setBasicSalary(300)
//           ->setBonus(.05)
//           ->setBonus(.05)
//           ->setBonus(.02)
//           ->setTotalSalary()
//           ->deduction(.02)
//           ->showDetails();



// $cat = new Cat();
// $dog = new Dog();

// $animals = [$cat , $dog];

// foreach($animals as $animal)
//     {
//         echo $animal->makeSound() . " <br>";
//     }


// echo Employee::test();

// $calculator = new Calculator();
// echo $calculator->add(10 , 30);


Carbon::setLocale('ar');


$date = Carbon::now()->subDays(25);

// عرض الفارق الزمني باللغة العربية
echo $date->diffForHumans(); // المخرجات: منذ عام واحد (أو منذ سنة)

