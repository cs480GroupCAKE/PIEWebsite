<?php 
    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $message = wordwrap($message, 70, "\r\n");
    
    mail('caketeamcwu@gmail.com',$subject, "From: ".$sender."\r\n".$message);

    header('Location:../helpPage.php');

?>