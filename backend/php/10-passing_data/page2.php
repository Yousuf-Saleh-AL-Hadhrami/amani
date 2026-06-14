<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Two</title>
</head>
<body>

<?php 

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_GET['name']))
{
    $name = $_GET['name'];
}

if(isset($_GET['search']))
{
    $search = $_GET['search'];
}

// Ternary Operator  condition ? True : False

// xss => cross site scripting

$id = isset($_GET['id']) ? strip_tags($_GET['id']) : '';

$id = htmlspecialchars($id);


 echo $id;

    ?>
    
  <h1>Page 2 <a href="page1.php">Visit Page 1</a></h1>
</body>
</html>