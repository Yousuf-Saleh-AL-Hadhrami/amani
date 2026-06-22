<?php 

try{
    
$connection = mysqli_connect("localhost","root","","amani");

}catch(Exception $e)
{
    echo $e->getMessage();
}
