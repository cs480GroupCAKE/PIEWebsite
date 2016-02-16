
<?php
/*
page will verify user login by comparing password to that stored in database
if error will log attempt, inform user and ask for password again, after x atte$
will lock account for y minutes. User will have option for email reset.

currently verifies username is in database and checks if password entered is ma$
if successful success message is displayed, otherwise password or username erro$
*/
/*
KEEP THIS CODE HERE AND COMMENTED OUT, FOR DEBUGGING
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('dispaly_startup_errors', '1');
    echo ini_get('display_errors');
*/
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">

</head>

    
<body> 
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include './templates/header.php'?>
            </div>
        </div>
    
        <div id='body'>
            <br>
            <form action="./background/login.php" method="post">
                Username:
                <br>
                <input type="text" name="username" required placeholder>
                <a style="color:red">
                    <?php $reasons = array("UsernameDNE" =>"Username does not exist",
                                           "blank" => "USERNAME ERROR");
                        if ($_GET["loginFailedUsername"]) echo "<br>".$reasons[$_GET["reason"]];
                    ?>
                </a>
                <br><br>
                
                Password:
                <br>
                <input type="password" name="password" required placeholder></br>
                <a style="color:red">
                    <?php $reasons = array("invalidPass" => "Invalid password. Please re-enter.",
                                           "blank" => "PASSWORD ERROR");
                        if ($_GET["loginFailedPass"]) echo $reasons[$_GET["reason"]]."<br>";
                    ?>
                </a>
                <br>
                
                <input id='button' type="submit" name="login" value="Login"> 
            </form>
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>
        
</body>
</html>

