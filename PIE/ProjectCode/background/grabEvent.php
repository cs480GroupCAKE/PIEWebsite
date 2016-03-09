<DOCTYPE PHP>
<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');

?>
<?php
    session_start();
    require '../database/database.php';
    
    $id = $_GET['id'];
    $d = $_GET['d'];
    $view_single = $_GET['vse'];
    
    
    $eventQ = "SELECT * FROM events WHERE eventid = '$id';";
    //$current_event = array();
    $subQ = mysqli_query($database, $eventQ);
    
    if($current_event = mysqli_fetch_assoc($subQ)){
        $_SESSION['current_event'] = $current_event;
       // echo sizeof($_SESSION['current_event']);
    }else{
        echo "error ".$eventsQ."<br>".$database->error;
    }
    
    if($d=='t'){
        $_SESSION['delete'] = 'true';
        header("Location:./createEvent.php");
        die();
    }else if($view_single == 't'){
        header("Location:../viewSingleEvent");
        die();
    }

    header('Location:../updateEvent.php');