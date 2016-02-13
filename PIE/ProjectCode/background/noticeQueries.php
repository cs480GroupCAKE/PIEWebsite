<!DOCTYPE PHP>
<?php require './database/database.php';
   
    session_start();

    $username = $_SESSION['username'];    
    //QUERIES
    $connectionsQ = "SELECT * FROM notifications WHERE username = '$username'";
    $subQ = mysqli_query($database, $connectionsQ);
    
    //RESULT ARRAYS
    $connArr = array();
    
    
    while($row = mysqli_fetch_assoc($subQ)){
        $connArr[] = $row;
    }
   
?>