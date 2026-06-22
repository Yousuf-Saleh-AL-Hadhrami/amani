
<?php 
session_start();
$title = 'Dashboard';
include "./authenticate.php";
include "./isUser.php";
include "./../includes/header.php";
include "./../includes/userNavbar.php";



?>

<h1>Welcome <?= $_SESSION['name'] ?></h1>



<?php 

include "./../includes/footer.php";