<!DOCTYPE PHP>
<?php 
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/

    require './database/database.php';
    session_start();

    $username = $_SESSION['username'];
    
    //QUERIES
    $searchQ = "Select contact, pending FROM connections WHERE username = '$username'";
    $sub = mysqli_query($database, $searchQ);
    
    
    //RESULT ARRAYS
    $resArr = array();
    $pendArr = array();
    $current_contacts;
    
    while($row = mysqli_fetch_row($sub)){
        $resArr[] = $row;
        $pendArr[] = $row[1];
        }
    for($i=0; $i<sizeof($resArr); $i++){
        if($resArr[$i][1]=='N'){
            $current_contacts[] = $resArr[$i][0];
        }
    }
  
?>
