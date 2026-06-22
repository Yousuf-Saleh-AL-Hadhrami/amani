<?php 

if(isset($_SESSION['role']) && $_SESSION['role'] !== 'user')
    {
        header("location: ./../admin/dashboard.php");
        exit;
    }