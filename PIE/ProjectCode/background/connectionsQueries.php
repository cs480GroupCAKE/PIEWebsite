<!DOCTYPE PHP>
<?php require './database/database.php';
    session_start();

    $username = $_SESSION['username'];
    
    //QUERIES
    $searchQ = "Select contact FROM connections WHERE username = '$username'";
    $sub = mysqli_query($database, $searchQ);
    
    
    //RESULT ARRAYS
    $resArr = array();

    while($row = mysqli_fetch_row($sub)){
        $resArr[] = $row[0];
        }
  
?>
