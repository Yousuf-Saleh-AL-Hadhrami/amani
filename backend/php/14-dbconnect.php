<?php 

/*
 - mysqli procedural 
 - mysqli oop 
 - PDO []
*/

try{
$connection = mysqli_connect("localhost","root","","amani");
if($connection)
    {
        //echo "Connected";
    }
}catch(Exception $e)
{
    echo $e->getMessage();
}
