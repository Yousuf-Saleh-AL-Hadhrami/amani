<?php 

// $myArray = array();
// Indexed Array
$myArray = [1,5,"Ali","Nasser", 10.3, true, false];

// echo $myArray[5];

// echo count($myArray);

// Associative Array
$languages = [
   "ar" => "Arabic",
   "en" => "English",
   "fr" => "French",
   "ja" => "Japanese",
   true => "Yes",
   false => "No",
];

// echo $languages["ja"];

// foreach($languages as $key => $value)
//     {
//         echo "$key => ". $value . "<br>";
//     }


// Multidieminsional Array 

$employees = [

     ["id" => 100 , "name" => "Yousuf", "job"=> "Programmer", ["HTML","CSS","JS",["Excellent","Good","Failed"]]],
     ["id" => 200 , "name" => "Abdelbasit", "job"=> "Programmer"],
     ["id" => 300 , "name" => "Amani", "job"=> "Software Engineer"],

];


echo $employees[0][0][3][1];