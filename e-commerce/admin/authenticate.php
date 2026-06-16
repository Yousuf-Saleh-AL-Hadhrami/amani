<?php

if(!isset($_SESSION['login']))
    {
        header("location: ./../auth/login.php");
        exit;
    }