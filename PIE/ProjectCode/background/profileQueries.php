<!DOCTYPE PHP>
<?php require './database/database.php';
   
    session_start();

    $username = $_SESSION['username'];    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$username'";
    $eventsQ = "SELECT * FROM events WHERE username = '$username' ORDER BY date";
    $subQ = mysqli_query($database, $eventsQ);
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    $eventArr = array();

 
    while($row = mysqli_fetch_assoc($subQ)){
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

