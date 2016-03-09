<?php 
    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = 'caketeamcwu@gmail.com';
    $headers = "From: ".$sender."\r\n"."Reply-To: ".$sender;/*."X-Mailer: PHP/".phpversion();*/
    $message = wordwrap($message, 70, "\r\n");
    
    echo $to.subject.$message.$headers;
    
    
    if(mail($to,$subject, $message, $headers)==TRUE){
        echo "<br>mailed";
    }

    //header('Location:../helpPage.php');

?>