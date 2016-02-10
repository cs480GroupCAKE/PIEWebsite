<?php
/*
page will verify user login by comparing password to that stored in database
if error will log attempt, inform user and ask for password again, after x attempts
will lock account for y minutes. User will have option for email reset.

currently verifies username is in database and checks if password entered is matches whats stored
if successful success message is displayed, otherwise password or username error displayed
*/

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('dispaly_startup_errors', '1');
    echo ini_get('display_errors');
?>

<?php require '../database/database.php';?>

<?php

    session_start();
    $_SESSION['username'] = 'username';

    $username =  $_POST["username"]; 
    $password = $_POST["password"];


	 /*
DO NOT REMOVE KEEP COMMENTED OUT UNLESS NEEDED FOR DEBUGGING
checks if mysqli installed, troubleshooting

 if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
      echo 'no mysqli :(';
 } else {
      echo 'we ve got it';
 }
*/	
 

    $query = "SELECT * FROM user WHERE username = '$username'";

    $getPass = mysqli_fetch_assoc(mysqli_query($database, $query));
    $currentPass  = $getPass['password'];

    //check if username is in database if not return error message
    if($getPass['username']==null) {
        die(header("Location:../loginPage.php?loginFailedUsername=true&reason=UsernameDNE"));
        exit();
    }

    if(password_verify($password, $currentPass)) {
        $_SESSION['username'] = $username;
        header("Location:../profile.php");//work to be done here, should redirect and such, right now simple
    } else {
        //will return to page and error message shown
        die(header("Location:../loginPage.php?loginFailedPass=true&reason=invalidPass"));
    }

    //header("Location:welcome.html");
    $database.close();
?>
