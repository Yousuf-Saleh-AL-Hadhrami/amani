<?php
session_start();

echo "Welcome ". $_SESSION['name'] . " to My Dashboard";