<?php
session_start();
$username =  $_POST["username"];
$password = $_POST["password"];
header("Location:welcome.php");
?>