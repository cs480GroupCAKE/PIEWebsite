<!DOCTYPE PHP>

<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>

<html>
<head>
    <?php
         session_start();
         $current = $_SESSION['current_event'];
    ?>
    <title>Event <?php echo $current['eventname'];?></title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/about.css">

</head>

<body onload="init()">
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php require './background/loggedcheck.php'; ?>
            </div>
            
            <h1><?php echo $current['eventname']?> Details</h1>
        </div>
        
        <div id='divCenter'>
            <div id='body'>
                <div class="tabContent">
                      <?php
                        echo "<a>Name: </a>".$current['eventname']."<br>";
                        echo "<a>Created By: </a>".$current['username']."<br>";
                        echo "<a>Location: </a>".$current['location']."<br>";
                        echo "<a>Date: </a>".$current['date']."<br>";
                        echo "<a>Time: </a>".$current['time']."<br>";
                        echo "<a>Attending: </a><br>".$current['attending']."<br><br>";
                        echo "<a>--Details--</a><br>".$current['details']."<br><br>";
                    ?>
                </div>
                <button id='button' onclick="location='./viewAllEvents'">Back</button>
            </div>
        </div>
        
        <div id='footer'>
            <?php include './templates/footer.php';?>
        </div>
        
    </div>
</body>
</html>
<?php unset($_SESSION['current_event']);?>