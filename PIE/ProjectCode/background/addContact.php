<DOCTYPE! PHP>
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
    require '../database/database.php';
    
    session_start();
    
    $sender = $_SESSION['username'];
    $recipient = $_SESSION['vusername'];
    $accept = "<a href='./background/noticeAction.php?accept=true&sender=".$sender."'>Accept</a>";
    $decline = "<a href='./background/noticeAction.php?accept=false&sender=".$sender."'>Decline</a>";
    $notice = "Connection request";
    $pending = "Y";
    $view = "<a href='./viewProfile?vusername=".$recipient."'>View Profile</a>";
    
    $insert = "INSERT INTO notifications VALUES('$recipient','$sender',\"$accept\",\"$decline\",'$notice',\"$view\");";
    $insertPend = "INSERT INTO connections VALUES('$sender','$recipient','$pending');";
    
    echo "something";
    if($database->query($insert)==TRUE&&$database->query($insertPend)==TRUE){
        header("Location:../profile.php");
    }else{
        echo "error ".$insert."<br>".$database->error;
    }


?>