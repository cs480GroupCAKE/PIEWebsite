<?php 
    ini_set("SMTP", "aspmx.l.google.com");
    session_start();
    require_once "./recaptchalib.php";
    
    $_SESSION['sender'] = $_POST['sender'];
    $_SESSION['subject'] = $_POST['subject'];
    $_SESSION['message'] = $_POST['message'];
    $_SESSION['helpname'] = $_POST['name'];

    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
    }else{
        $user = "unregistered or not signed in";
    }
    
    
    if(isset($_POST['g-recaptcha-response'])){
        $capt = $_POST['g-recaptcha-response'];
    }
    
    if(!$capt){
        echo "<h2> Please check the captcha box</h2>";
        header( "refresh:2; url=../helpPage" );
        exit;
    }

    $secretKey = "";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$capt."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
        echo '<h2>Failed Captcha</h2>';
        header( "refresh:2; url=../profile" );
        exit;
        
    } else {
        echo '<h2>Thanks for Sending Email<br></h2>';
    }


    $sender = "caketeamcwu@gmail.com";
    $subject = $_POST['subject']." PIE HELP PAGE user-> ".$user;
    $message = $_POST['message'].$_POST['sender'];
    $to = 'caketeamcwu@gmail.com';
    $headers = "From: ".$sender."\r\nReply-To: ".$sender;/*."X-Mailer: PHP/".phpversion();*/
    $message = wordwrap($message, 70, "\r\n");


    
    
    ini_set("caketeamcwu@gmail.com", $to);
    
   if(mail($to,$subject, $message, $headers)==TRUE){
        echo "<br>mail sent. Redirecting";
   }
   
   
  header( "refresh:2; url=../profile" ); 
 

    //header('Location:../helpPage');


?>