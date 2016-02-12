<!DOCTYPE PHP>
<?php require './database/database.php';
   
    session_start();

    $username = $_SESSION['username'];    
    //QUERIES
    $connectionsQ = "SELECT * FROM notifications WHERE username = '$username'";
    
    //RESULT ARRAYS
    if($connArr = mysqli_fetch_assoc(mysqli_query($database, $connectionsQ))){

    //ELEMENTS
    $contact = $connArr['contact'];
    $notice = $connArr['notice'];
    }else{
        die($username);
    }
   
?>