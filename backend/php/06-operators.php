<?php

/*
  - Assignment Operators [ = ]
  - Mathematical Operators [ + , - , * , / , % ]
  - Comparison Operators [ > , < , >= , <= , == , === , != , !== ]
  - Logical Operators    [ && , || , and , or , xor ]
  - pre/post increment/decrement operators [ ++ , -- ]
  - compound operators += , -= , %= , /= , *= 
  - concatenation operator [ . ]

*/

$x = 10;

// if($x == 10 && 5 == 5) // both must be true
//     {
//          echo "Yes Both are True";
//     }

// if($x == 10 || 5 == 4 ) // one at leaset must be true
//     {
//          echo "Yes condition is true";
//     }


// if($x == 10 && 3 == 3 xor 3 == 3  ) //at lease thers are false and one must be true to return true
//     {
//          echo "True";
//     }    

// Priority or operator precedence
// echo ( 3 + 5 ) * 4 - 2 * 1;

    // 8 * 4 - 2 * 1
    // 32 - 2

    // pre-increment 
    // ++$x;
    // echo $x++;
    // echo "<br>";
    // echo $x++;
    // echo --$x;

    $greeting = 'Hello';
    $greeting .= ' ';
    $greeting .= 'Yousuf';
    $greeting .= ' ';
    $greeting .= 'I am Here';

    
    echo strlen($greeting);
    
