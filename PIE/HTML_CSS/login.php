<?php
/*
page will verify user login by comparing password to that stored in database
if error will log attempt, inform user and ask for password again, after x attempts
will lock account for y minutes. User will have option for email reset.

For now, will be relatively empty and only redirect to dummy welcome page.
*/
session_start();
$username =  $_POST["username"];
$password = $_POST["password"];
header("Location:welcome.html");
?>
