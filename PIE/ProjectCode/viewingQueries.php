<!DOCTYPE PHP>
<?php require 'database.php';
    //include_once 'search.php';
    session_start();

    $vusername = $_POST['searchedUser'];
    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$vusername'";
    $eventsQ = "SELECT * FROM events WHERE username = '$vusername' ORDER BY date";
    $connectionsQ = "SELECT * FROM connections WHERE username = $'vusername'";
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    //$eventsArr = array();
    //eventsAssoc
    $eventsArr = mysqli_fetch_array(mysqli_query($database, $eventsQ));
    //$i = 0;
    
    
    

    //ELEMENTS
    $descRes = $userArr['description'];
    $vusername = $userArr['username'];
    $dob = $userArr['birthdate'];
    
    $eventname = $eventsArr['eventname'];
    $eventtype = $eventsArr['type'];
    $eventuser = $eventsArr['username'];
    $eventdate = $eventsArr['date'];
    $eventdetails = $eventsArr['details'];
    $eventinfo = "Event Name: ".$eventname."<br>Type: ".$eventtype."<br>Date: ".$eventdate."<br>Created By: ".$eventuser."<br>Details: ".$eventdetails."<br><br>";
    
   
?>

