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
        echo "Session Active ".$_SESSION['username'];
    }
    //$arr = array();
    $arr = $_SESSION['current_event'];
    $id = $arr['eventid'];
    $delete = $_SESSION['delete'];
    
    $deleteEvent = "DELETE FROM events WHERE eventid='$id';";
/*   
     echo "$delete = '$delete'<br>";
     echo "session[] = ".$_SESSION['delete']."<br>";
*/          
    if($delete=='true'){
        if($database->query($deleteEvent)==TRUE){
            echo "in if statement";
            unset($_SESSION['delete']);
            unset($_SESSION['current_event']);
            header("Location:../viewAllEvents");
            die();
        }else{
            echo "error".$updateEvent.$database->error;
        }
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
    $eventdate = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
    
    //Post date in correct format
    $date = $_POST['year']."-".$mosNum."-".$_POST['day'];
    $username = $_SESSION['username'];
    $eventname = $_POST["eventname"];
    $details = $_POST["eventdetails"];
    $location = $_POST['location'];
    
    //invites
    $time = $_POST['time'];
    $list = $_POST['ctcb'];
    $inviteNotice = "Event Invitation";
    $acceptInvite = "<a href='./background/noticeAction?id=".$id."&eaccept=t'>Attend</a>";
    $declineInvite = "<a href='./background/noticeAction?id=".$id."&eaccept=f'>Decline Invite</a>";
    $view = "<a href='./background/grabEvent?id=".$id."&vse=t'>View Event</a>";
    
    
    $updateEvent = "UPDATE events SET username='$username', eventname='$eventname',details='$details',
                    date='$eventdate', location='$location', time='$time' WHERE eventid='$id';";
    
    $enterEvent = "INSERT INTO events (username, eventname, details, date, location, time) 
                   VALUES('$username','$eventname','$details','$eventdate', '$location', '$time');";
    
    $grab_id = "SELECT eventid FROM events ORDER BY eventid DESC";

   
    if($id == NULL){
        if($database->query($enterEvent)===TRUE){
            
            $row = mysqli_query($database, $grab_id);
            $idarr= mysqli_fetch_assoc($row);
            $id=$idarr['eventid'];
            
            $user_up = "UPDATE user SET events=events + ':".$id."' WHERE username='$username'";
            echo $user_up;
            if($database->query($user_up)==FALSE){
                echo "error ".$user_up."<br>".$database->error;
                die();
            }
            
        }else{
            echo "error ".$createEvent."<br>".$database->error;
        }                     
        
    }else{
        if($database->query($updateEvent)==TRUE){
            unset($_SESSION['current_event']);
        }else{
            echo "error".$updateEvent.$database->error;
        }
    }
    
    $acceptInvite = "<a href='./background/noticeAction?id=".$id."&eaccept=t'>Attend</a>";
    $declineInvite = "<a href='./background/noticeAction?id=".$id."&eaccept=f'>Decline Invite</a>";
    $view = "<a href='./background/grabEvent?id=".$id."&vse=t'>View Event</a>";
            
    $inviteEventA = "Insert INTO notifications (username, sender, accept, decline, notice, view, eventid)
                     Values('";
    $inviteEventB = "', '$username',\"$acceptInvite\",\"$declineInvite\",'$inviteNotice',\"$view\", '$id');";
    
    foreach($list as $tempUser){
       if($database->query($inviteEventA.$tempUser.$inviteEventB)==FALSE){
       echo "error".$createEvent."<br>".$database->error;
       }
    }    
            
    header("Location:../viewAllEvents.php");
?>
