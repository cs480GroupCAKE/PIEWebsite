<!DOCTYPE PHP>
<?php 
/*
KEEP THIS CODE HERE AND COMMENTED OUT, FOR DEBUGGING
 */ 
  error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('dispaly_startup_errors', '1');
    echo ini_get('display_errors');


   require '../database/database.php';
   session_start();
   $sender = $_GET['sender'];
   $action = $_GET['accept'];
   $username = $_SESSION['username'];
   $eventid = $_GET['id'];
   $event_action = $_GET['eaccept'];
   $delete_invite = "DELETE FROM notifications WHERE eventid='$eventid' and username='$username';";
   $delete_conn_req = "DELETE FROM notifications WHERE notice='Connection request' AND sender='$sender' AND username='$username'";
   
     
   
   if($eventid != NULL){
       if($event_action == 't'){
           $get_attending = "SELECT attending FROM events WHERE eventid='$eventid';";
           $attarr = mysqli_fetch_assoc(mysqli_query($database, $get_attending));
           $attending = $attarr['attending'].":".$username;
           $insert_attending = "UPDATE events SET attending='$attending' WHERE eventid='$eventid';";
           $insert_to_user = "UPDATE user SET events=concat(ifnull(events, ''),':".$eventid."') WHERE username='$username';";
           if($database->query($insert_attending)==FALSE){
               echo "error ".$insert_attending."<br>".$database->error;
           }
           if($database->query($insert_to_user)==FALSE){
               echo "error ".$insert_to_user."<br>".$database->error;
           }
       }
       $database->query($delete_invite);
       header("Location:../notices");
       die();
   }
   
   
   
if(isset($_GET['accept'])){
    if($action == 'true'){
        $enterConn = "UPDATE connections SET pending='N' WHERE username='$sender' AND contact='$username';";
        $database->query($enterConn);
    /*else if($action == 'attend'){
        $attendEvent = "SELECT attending FROM events WHERE id = '$eventid';";
        $string = $databse->query($attendEvent);
        $string = $string." ".$username;
        $insertEvent = "UPDATE events SET attending='$string' WHERE id='$eventid';";
        $database->query($insertEvent);
       */ 
    }else{
        $deleteConn = "DELETE FROM connections WHERE username = '$sender' AND sender = '$username';";
        $database->query($deleteConn);
    }
}
    
    if($database->query($delete_conn_req)==TRUE){
        header("Location:../notices.php");
    }
    echo "SOMETHING";
    echo "error ".$enterConn."<br>".$database->error;
    
?>