<!DOCTYPE PHP>
<?php require './database/database.php';
   
    session_start();

    $username = $_SESSION['username'];    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$username'";
    
    $get_event_ids = "SELECT events FROM user WHERE username='$username';";
    
    $temp = mysqli_query($database, $get_event_ids);
    
    $temp_row = mysqli_fetch_assoc($temp);
    
    $event_id_arr = explode(":", $temp_row['events']);
 
    
    $eventsQ = "SELECT * FROM events WHERE username = '$username' ORDER BY date";
    $subQ = mysqli_query($database, $eventsQ);
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    $eventArr = array();

 
    foreach($event_id_arr as $event){
        if($event == '0' || $event == ''){continue;}
        $Q = "SELECT * FROM events WHERE eventid='".$event."' ORDER BY date;";
        $row = mysqli_fetch_assoc(mysqli_query($database,$Q));
        $date = explode("-",$row['date']);
        $date_formatted = $date[1]."/".$date[2]."/".$date[0];
        $row['date'] = $date_formatted;
        $eventArr[] = $row;
    }
    
    

    //ELEMENTS
    $descRes = $userArr['description'];
    $_SESSION['current_d'] = $descRes;
    $username = $userArr['username'];
    $dob = $userArr['birthdate'];

   
?>

