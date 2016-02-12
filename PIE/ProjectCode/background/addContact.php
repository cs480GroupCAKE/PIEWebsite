<DOCTYPE! PHP>
<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>

<?php
    require '../database/database.php';
    
    session_start();
    
    $sender = $_SESSION['username'];
    $recipient = $_SESSION['vusername'];
    $connNotice = "<a href='noticeAction.php?accept=true'>Accept\t\t</a><a href='noticeAction.php?accept=false>Decline</a>";
    
    $insert = "INSERT INTO notifications VALUES('$recipient','$sender','$connNotice')";
    
    if($database->query($insert)===TRUE){
        header("Location:../profile.php");
         }
    }else{
        echo "error ".$createConn."<br>".$database->error;
    }


?>