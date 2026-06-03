<?php
declare(strict_types=1);
/*

- built-in functions 
- user defined functions
- arrow functions
- anonymous functions

*/


// echo strlen("Amani");
// echo "<br>";
// echo str_repeat("Ali",5);
// echo "<br>";
// echo str_replace(["Ali","Nasser","Salim"], "gffdgf", "Amani");

// function sayHello(int $age , string $name = '', $hobbies = []):string
// {
//     return 'Hello '. $name. " Your Age is " . $age . "Your Hobbies are " . implode("-",$hobbies);
// }

// echo sayHello(name: "Amani", age: 20, hobbies: ["Programming","Footabll"]); // named arguments


$dictionary = [
    "Home" => "الصفحة الرئيسة",
    "Services" => "خدماتنا",
    "Contact Us" => "تواصل معنا",
];

function translate(string $word ,  array $dictionary, $lang = 'ar'):string
{
 
    // foreach($dictionary as $key => $value)
    //     {
    //         if($word == $key)
    //             {
    //                return $value;
    //             }
    //     }

    //     return $word;

    return $dictionary[$word] ?? $word;
}


echo translate("Home", $dictionary);
