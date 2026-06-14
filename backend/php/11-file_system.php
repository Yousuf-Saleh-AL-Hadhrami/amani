<?php 

/*

 - 
*/

$bytes = disk_total_space("D:");
$bytes = disk_free_space("C:");

$kiloBytes = $bytes / 1024;
$megaByte = $kiloBytes / 1024;
$gigaByte = $megaByte / 1024;


// echo ceil(5.2);  // goes to the top always
// echo PHP_EOL;
// echo floor(5.9); // goes to down
// echo PHP_EOL;
// echo round(5.5);
// echo PHP_EOL;
// echo abs(-5.5);

echo floor($gigaByte);
echo PHP_EOL;

if(!file_exists('test2'))
    {
        mkdir('test2');

        echo "folder created";
    }

 unlink('test2/yousuf.txt');
 rmdir('test2');

 $images = scandir('uploads');

 var_dump($images, 'x', 'y');






