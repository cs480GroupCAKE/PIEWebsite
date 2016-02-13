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
    
    $insert = "INSERT INTO notifications VALUES('$recipient','$sender',\"$accept\",\"$decline\",'$notice');";
    echo "something";
    if($database->query($insert)==TRUE){
        header("Location:../profile.php");
    }else{
        echo "error ".$insert."<br>".$database->error;
    }


?>