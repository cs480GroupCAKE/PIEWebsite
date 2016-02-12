<!DOCTYPE PHP>
<?php require './database/database.php';
   session_start();
   $sender = $_GET['sender'];
   $username = $_SESSION['username'];
   $deleteNotice = "DELETE FROM notifications WHERE username = '$username' AND sender = '$sender'";
   
if(isset($_GET['accept']){
    if($_GET['accept'] == 'true'){
            $enterConn = "INSERT INTO connections VALUES('$username','$sender')";
    }
    
    if($database->query($enterConn)===TRUE||$_GET['accept']=='false'){
         if($database->query($deleteNotice)==TRUE){
            header("Location:../notices.php");
         }
    }else{
        echo "error ".$createConn."<br>".$database->error;
    }
?>