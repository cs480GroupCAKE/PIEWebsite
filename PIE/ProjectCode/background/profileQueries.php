<!DOCTYPE PHP>
<?php require './database/database.php';
   
    session_start();

    $username = $_SESSION['username'];    
    //QUERIES
    $descriptionQ = "Select * FROM user WHERE username = '$username'";
    $eventsQ = "SELECT * FROM events WHERE username = '$username' ORDER BY date";
    
    //RESULT ARRAYS
    $userArr = mysqli_fetch_assoc(mysqli_query($database, $descriptionQ));
    //$eventsArr = array();
    //eventsAssoc
    $eventsArr = mysqli_fetch_array(mysqli_query($database, $eventsQ));
    //$i = 0;
    
    
    

    //ELEMENTS
    $descRes = $userArr['description'];
    $username = $userArr['username'];
    $dob = $userArr['birthdate'];
    
    $eventname = $eventsArr['eventname'];
    $eventtype = $eventsArr['type'];
    $eventuser = $eventsArr['username'];
    $eventdate = $eventsArr['date'];
    $eventdetails = $eventsArr['details'];
    //accessEvents needs to be able to collect atleast eventname from database 
	//this way I can call it on profile.php and use it with the slider.
	
	//$accessEvents=array();
	//$accessEvents=$eventsArr['eventname', 'date', 'description'];
	
	//loop through array with the number of events
	//for($j=0;$j<=$events.length();Sj++){
		//echo"one of the events we found in DB is $j";
	//}
   
?>

