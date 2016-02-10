<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

require '../database/database.php';
session_start();
    if(isset($_SESSION['username'])){
        echo "Session Active"/$_SESSION['username'];
    }
    
    $desc = $_POST["description"];
    
    $username = $_SESSION['username'];
    
        $insertDesc = "UPDATE user SET description='$desc' 
        WHERE username = '$username';";
    
     if($database->query($insertDesc)===TRUE){
            header("Location:../profile.php");
            //printf("Success! Your username is: %s\n Born year: %s\n",$user, $dob);// $row);this needs work
        }else{
        echo "error ".$insertDesc."<br>".$database->error;
        }


?>