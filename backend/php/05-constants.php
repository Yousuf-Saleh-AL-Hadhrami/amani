<?php 

/*

  - predefined constants 
  - magic constants 

  - user defined constants 

*/
// 8.0.2
// Major.Minor.Patch

// predefined constants 
echo PHP_VERSION;
echo "<br>";
echo PHP_INT_MAX;
echo "<br>";
echo PHP_OS;

//phpinfo();

echo "<br>";


echo __line__;
echo "<br>";
echo __FILE__;
echo "<br>";
echo __DIR__;
echo "<br>";

function sayHell()
{
    echo __FUNCTION__;
}

sayHell();

echo "<br>";

// user defined constants 

define("PATH", "http://localhost/amani/backend/php");

const AGE = 18;

echo PATH;
echo "<br>";
echo AGE;




