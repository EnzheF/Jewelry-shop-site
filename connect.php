<?php
$link = mysqli_connect('localhost', 'root', 'root') or 
die("No connection");
mysqli_select_db($link, 'jewelry') or 
die("No connection");
?>
