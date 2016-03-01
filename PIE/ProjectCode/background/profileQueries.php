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
   // eventsAssoc
   // $eventsArr = mysqli_fetch_array(mysqli_query($database, $eventsQ));
   // $i = 0;
 
    while($row = mysqli_fetch_assoc($subQ)){
        $date = explode("-",$row['date']);
        $date_formatted = $date[1]."/".$date[2]."/".$date[0];
        $row['date'] = $date_formatted;
        $eventArr[] = $row;
    }
    
    

    //ELEMENTS
    $descRes = $userArr['description'];
    $username = $userArr['username'];
    $dob = $userArr['birthdate'];
    /*
    $eventname = $eventsArr['eventname'];
    $eventtype = $eventsArr['type'];
    $eventuser = $eventsArr['username'];
    $eventdate = $eventsArr['date'];
    $eventdetails = $eventsArr['details'];
    //$eventtime = $eventsArr['time'];
    */
	
	//accessEvents needs to be able to collect atleast eventname from database 
	//this way I can call it on profile.php and use it with the slider.
	// $accessEvents =$eventsArr['eventname'];
	// $accessEvents .=$eventsArr['type'];
	// $accessEvents .=$eventsArr['date'];

	
	// $result = mysqli_query($database, $eventsQ);
     // if (!$result) {
	// echo("Nothing found");
     // }
    //data converted into array
     // while ($row = mysqli_fetch_assoc($result)){
	// $array_data[] = $row;
   // }
     //encode the data into array.
    // $json = json_encode($array_data);
	//displays all events from the database.
    // echo $json;


	//loop through array with the number of events
	
	//for($accessEvents=1;$accessEvents<=$events.length();$accessEvents++){
	 //   echo "one of the events we found in DB is $accessEvents";
	//}
   
?>

