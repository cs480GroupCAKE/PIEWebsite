<!DOCTYPE PHP>
<?php
require 'database.php';
  
    session_start();
    if(isset($_SESSION['username'])){
        echo "Session Active"/$_SESSION['username'];
    }

    $username = $_SESSION['username'];
    $eventname = $_POST["eventName"];
    $details = $_POST["eventDetails"];
    
    $enterEvent = "INSERT INTO events (username, eventname, details) 
        VALUES('$username','$eventname','$details')";
    
     if($database->query($enterEvent)===TRUE){
            header("Location:profile.php");
            //printf("Success! Your username is: %s\n Born year: %s\n",$user, $dob);// $row);this needs work
        }else{
        echo "error ".$createEvent."<br>".$database->error;
        }
?>