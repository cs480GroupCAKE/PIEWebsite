<!DOCTYPE PHP>
<?php require './database/database.php';
    //include_once 'search.php';
    session_start();

    $vusername = $_GET['vusername'];
    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$vusername'";
    $eventsQ = "SELECT * FROM events WHERE username = '$vusername' ORDER BY date";
    $connectionsQ = "SELECT * FROM connections WHERE username = $'vusername'";
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    //$eventsArr = array();
    //eventsAssoc
    $subQ = mysqli_query($database, $eventsQ);
    //$i = 0;
    
    $eventArr = array();
    
    while($row = mysqli_fetch_assoc($subQ)){
        $date = explode("-",$row['date']);
        $date_formatted = $date[1]."/".$date[2]."/".$date[0];
        $row['date'] = $date_formatted;
        $eventArr[] = $row;
    }
    

    //ELEMENTS
    $descRes = $userArr['description'];
    $vusername = $userArr['username'];
    $dob = $userArr['birthdate'];
   
?>

