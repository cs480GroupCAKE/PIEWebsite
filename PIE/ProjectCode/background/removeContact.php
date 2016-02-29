<!DOCTYPE PHP>
<?php 
/*
KEEP THIS CODE HERE AND COMMENTED OUT, FOR DEBUGGING
*/ 
  error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('dispaly_startup_errors', '1');
    echo ini_get('display_errors');
 

   require '../database/database.php';
   session_start();
   $contact = $_GET['contact'];
   $username = $_SESSION['username'];
   $deleteContact = "DELETE FROM connections WHERE username = '$username' AND contact = '$contact'";
   $deleteUN = "DELETE FROM connections WHERE username = '$contact' AND contact = '$username'";
   
    
    if($database->query($deleteContact)==TRUE){
        header("Location:../viewConnections.php");
    }else if($database->query($deleteUN)==TRUE){
        header("Location:../viewConnections.php");
    }
   
    echo "SOMETHING WENT WRONG";
        echo "error ".$enterConn."<br>".$database->error;
    
?>