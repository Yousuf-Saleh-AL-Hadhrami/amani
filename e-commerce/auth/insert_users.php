<?php 

include "./../config/dbconnect.php";

$hashed_password = password_hash("123456", PASSWORD_DEFAULT);

$sql = " INSERT INTO users VALUES (NOT NULL, 'Hilal','AL Nabhani','hilal', '$hashed_password'); ";

$boolean = mysqli_query($connection , $sql);

$last_inserted = mysqli_insert_id($connection);

var_dump($last_inserted);