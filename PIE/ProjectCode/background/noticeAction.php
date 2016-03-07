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
   $username = $_SESSION['username'];
   $deleteNotice = "DELETE FROM notifications WHERE username = '$username' AND sender = '$sender';";
   
if(isset($_GET['accept'])){
    if($_GET['accept'] == 'true'){
        $enterConn = "UPDATE connections SET pending='N' WHERE username='$sender' AND contact='$username';";
        $database->query($enterConn);
    }else{
        $deleteConn = "DELETE FROM connections WHERE username = '$sender' AND sender = '$username';";
        database->query($deleteConn);
    }
}
    
    if($database->query($deleteNotice)==TRUE){
        header("Location:../notices.php");
    }
    echo "SOMETHING";
        echo "error ".$enterConn."<br>".$database->error;
    
?>