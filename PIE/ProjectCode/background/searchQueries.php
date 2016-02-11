<!DOCTYPE PHP>
<?php require './database/database.php';
    session_start();

    $searcheduser = $_POST['searchedUser'];
    
    //QUERIES
    $searchQ = "Select username FROM user WHERE username LIKE '%".$searcheduser."%'";
    $sub = mysqli_query($database, $searchQ);
    
    
    //RESULT ARRAYS
    $resArr = array();

    while($row = mysqli_fetch_row($sub)){
        $resArr[] = $row[0];
        }
   
    
    
    

    
    
?>

