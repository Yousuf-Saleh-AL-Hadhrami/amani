<?php 
// Unix epoch time 
// 1/1/1970 00:00:00 UTC
// echo time();
echo date_default_timezone_get();
echo "<br>";
date_default_timezone_set("Asia/Muscat");
echo date_default_timezone_get();
echo "<br>";
echo date("Y-m-d/l H:i:s", time() - 800 * 24 * 60 * 60);