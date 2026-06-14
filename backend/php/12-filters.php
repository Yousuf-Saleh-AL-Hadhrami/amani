<?php 

/*

 filter_var()
 filter_input()
 - filter_list()

 - validate
 - sanitize 

*/

 $id = '10adsasdasd';
$email = 'example@gmail.com<img/>';
$ip = '192.168.0.1';

//  if(filter_var($id, FILTER_VALIDATE_INT) == true)
//     {
//         echo "True";
//     }

$value = filter_var($email, FILTER_VALIDATE_IP);
$value2 = filter_var($email, FILTER_SANITIZE_EMAIL);

$username = 131312;
$username = filter_input(INPUT_GET, $username , FILTER_SANITIZE_NUMBER_INT);

 
var_dump($username);
    

// echo  "<pre>";

// var_dump(filter_list());

// echo $id;
