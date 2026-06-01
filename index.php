<?php
session_name();
session_start();

$_SESSION['username'] = 'admin';
$_SESSION['name'] = "Yousuf AL Hadhrami";
$_SESSION['login'] = true;
$_SESSION['salary'] = 300;



if(!isset($_COOKIE['test_cookie']))
setcookie("test_cookie","This_is_test_cookie", time() + 10, "/", "127.0.0.1", true, true);
   
// 2026-06-01T07:38:52.456Z
// 2026-06-01T06:40:37.633Z

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <h1>Welcome to Web Devlopement </h1>
    <?php 
        //   $request_method = $_SERVER['REQUEST_METHOD'];

        //   $headers = getallheaders();

        //   echo $request_method;
        //   echo "<br>";
        //   foreach($headers as $header)
        //     {
        //         echo $header . "<br>";
        //     }
    ?>
// This is how to link external js file
    <script src="js/main.js"></script>
</body>
</html>
