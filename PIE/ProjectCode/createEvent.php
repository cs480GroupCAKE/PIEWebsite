<!DOCTYPE PHP>
<?php
require 'database.php';

    $eventname = $_POST["eventName"];
    $eventDetails = $_POST["eventDetails"];
    
    $enterEvent = "INSERT INTO events (eventname, details) VALUES('$eventname','$eventDetails'";
    
     if($database->query($createEvent)===TRUE){
            header("Location:profile.php");
            //printf("Success! Your username is: %s\n Born year: %s\n",$user, $dob);// $row);this needs work
        }else{
        echo "error ".$createEvent."<br>".$database->error;
        }


?>