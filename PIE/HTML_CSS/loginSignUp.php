
<?php
/*
page will verify user login by comparing password to that stored in database
if error will log attempt, inform user and ask for password again, after x atte$
will lock account for y minutes. User will have option for email reset.

currently verifies username is in database and checks if password entered is ma$
if successful success message is displayed, otherwise password or username erro$
*/
/*
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('dispaly_startup_errors', '1');
    echo ini_get('display_errors');
*/
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="buttons.css">
        <link rel="stylesheet" type="text/css" href="template">
        <div id='cssmenu'>
            <?php include 'header.php'?>
        </div>
    </head>
    
    <body> 
        <form action="login.php" method="post">
        Username:
        <br>
        <input type="text" name="username" required placeholder>
        <a style="color:red">
            <?php $reasons = array("UsernameDNE" =>"Username does not exist",
            "blank" => "USERNAME ERROR");
                if ($_GET["loginFailedUsername"]) echo $reasons[$_GET["reason"]];
             ?>
        </a>
        <br>
        Password:
        <br>
        <input type="password" name="password" required placeholder></br>
        <a style="color:red">
            <?php $reasons = array("invalidPass" => "invalid password. Please re-enter.",
            "blank" => "PASSWORD ERROR");
                if ($_GET["loginFailedPass"]) echo $reasons[$_GET["reason"]];
            ?>
        </a>
        <input type="submit" name="login" value="Login" class="button big blue"> 
        </form>

        <form action = "signUp.html">
            <input type="submit" name="signUp" value="sign up" class="button big green">
        </form>
        
    </body>
</html>
<?php


?>
