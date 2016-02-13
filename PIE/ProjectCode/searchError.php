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
    //GLOBAL VARIABLES
    $MSG = "<br><br>This page does not exist!<br>Please try again"
?>

<html>
<head>
    <title>ERROR</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">

</head>
<body>
    <h1><?php echo $MSG;?></h1>
</body>
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php require './background/loggedcheck.php';?>
            </div>
        </div>
    
        <div id='body'>
    
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>

</html>
