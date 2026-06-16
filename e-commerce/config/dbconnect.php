<?php 

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
