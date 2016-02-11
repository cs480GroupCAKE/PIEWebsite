<!DOCTYPE PHP>
<?php

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
    <title>Search Results</title>

    <?php require './background/searchQueries.php';?>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">

    <div id='cssmenu'>
        <?php include './background/loggedcheck.php';?>
    </div>
</head>

<body>
    <?php
        //TESTING LEAVE IN echo sizeof($resArr);
        for($i=0; $i<sizeof($resArr);$i++){
            echo $resArr[$i]."<br>";
        }
    //require './templates/footer.php';    
    ?>
    
    
    
    <div id="footer">
        
    </div>
</html>