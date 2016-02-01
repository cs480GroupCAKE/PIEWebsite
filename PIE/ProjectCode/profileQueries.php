<!DOCTYPE PHP>
<?php require 'database.php';
    session_start();
    $username = $_SESSION['username'];
    
    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$username'";
    $eventsQ = "SELECT * FROM events WHERE username = '$username'";
    $connectionsQ = "SELECT * FROM connections WHERE username = $'username'";
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    $eventsArr = mysqli_fetch_assoc(mysqli_query($database, $eventsQ));
    
    //ELEMENTS
    $descRes = $userArr['description'];
    $username = $userArr['username'];
    $dob = $userArr['birthdate'];
    
    $eventname = $eventsArr["eventname"];
    $eventtype = $eventsArr["type"];
    $eventuser = $eventsArr["username"];
    
   
?>

