<?php 
if(!isset($_COOKIE['test']))
    {
        setcookie('test','This is Test Cookie', time() + 3600);
    }

            $browser = 'http://localhost/amani/backend/php/uploads/';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

/*

- $GLOBALS
- $_GET
- $_POST
- $_REQUEST => [ $_GET + $_POST + $_COOKIE ]
- $_SERVER
- $_COOKIE 
- $_SESSION 
- $_FILES 
- $_ENV

*/

// global scope
$x = 10;

// function test(int $number):float|int
// {
//     // global $x;
    
//     return $GLOBALS['x'] + $number;
// }

// echo test(5);

if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = htmlspecialchars($_POST['id']) ?? '';
        $uname = htmlspecialchars($_POST['uname']);
        $test = isset($_COOKIE['test']) ? htmlspecialchars($_COOKIE['test']) : 'الـ Cookie غير موجود';

        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];

        
        $exploded_string = explode(".", $image_name);
        $extension = end($exploded_string);
        $extension2 = strtolower($extension);
    
        $path = __DIR__ . '\\uploads\\';
        $full_path = $path . time() . '.'. $extension2;


       if(file_exists($path))
        {
            move_uploaded_file($tmp_name , $full_path);

            echo "Uploaded Image";

        }
  
        exit;
        echo $id . " ". $uname . " ". $test;
        echo "<br>";

    //     echo "<pre>";
    //     print_r($_SERVER);
    }
?>

<img src="<?= $browser.'1781461419.jfif' ?>">
<?=  getenv('.env.APP_NAME') ?>
<form action="?admin=admin" method="post" enctype="multipart/form-data">
<input type="text" name="id">
<input type="text" name="uname">
<input type="file" name="image">
<button type="submit">Send</button>
</form>



    
</body>
</html>