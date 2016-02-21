<!DOCTYPE PHP>
<?php
/*
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

?>

<?php
require '../database/database.php';
  
    session_start();
    if(isset($_SESSION['username'])){
        echo "Session Active"/$_SESSION['username'];
    }

/* This was used for the old dropdown date picker
    $mos = $_POST['mos'];
    $mosNum;
    
    
    switch($mos){
        case "Jan" : $mosNum = "01"; break;
        case "Feb" : $mosNum = "02"; break;
        case "Mar" : $mosNum = "03"; break;
        case "Apr" : $mosNum = "04"; break;
        case "May" : $mosNum = "05"; break;
        case "Jun" : $mosNum = "06"; break;
        case "Jul" : $mosNum = "07"; break;
        case "Aug" : $mosNum = "08"; break;
        case "Sep" : $mosNum = "09"; break;
        case "Oct" : $mosNum = "10"; break;
        case "Nov" : $mosNum = "11"; break;
        case "Dec" : $mosNum = "12"; break;
    }
*/
    
    //This is used for the jQuery calendar date picker
    $date = $_POST["eventdate"];
    
    //Split date into proper format for sql insertion
    $dateArray = explode("/", $date);
    $eventdat = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
    
    //Post date in correct format
    $date = $_POST['year']."-".$mosNum."-".$_POST['day'];
    $username = $_SESSION['username'];
    $eventname = $_POST["eventname"];
    $details = $_POST["eventdetails"];
    
    $enterEvent = "INSERT INTO events (username, eventname, details, date) 
                   VALUES('$username','$eventname','$details','$eventdat')";
    
    if($database->query($enterEvent)===TRUE){
        header("Location:../profile.php");
        //printf("Success! Your username is: %s\n Born year: %s\n",$user, $dob);// $row);this needs work
    }else{
        echo "error ".$createEvent."<br>".$database->error;
    }
    echo $date;
    echo working;
?>
