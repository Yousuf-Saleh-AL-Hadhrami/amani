<?php 

require './Person.php';

echo $p1 = (new Person(100, "Amani","AL Nabhani","Nizwa"))
      -> setAddress("Bahla")
      ->showPersonDetails();
      
// $p2 = new Person(200 , "Yousuf","AL Hadhrami", "Izki");
// $p3 = new Person(300 , "Abdelbasit","AL Mahroqi", "Izki");


// echo Person::class;
// echo Person::AGE;
// echo Person::getCounter();



