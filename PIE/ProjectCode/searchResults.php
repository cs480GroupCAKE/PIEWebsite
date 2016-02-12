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

<?php
    //Global PHP vars
    $user = "placeholder for username in array";
    $noResults = "Your search return no results. Please check spelling and try again.";
    $format1 = "<a href='./viewProfile.php?vusername=";
    $format2 = "'>View Profile</a><br>";
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
    <div id='divCenter'>
        <h2>Search Results</h2>
        <br>
        <?php if(sizeof($resArr) != 0): ?>
        <table id='cen-table'>
            <thead>
                <tr>
                    <th>username</th><th>link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //TESTING LEAVE IN echo sizeof($resArr);
                    for($i=0; $i<sizeof($resArr);$i++):
                        $user = $resArr[$i];
                        $link = $format1.$user.$format2;
                ?>
                <tr> 
                    <td><?php echo $user;?></td><td><?php echo $link;?>
                </tr>
                    
                <?php endfor; ?>
            </tbody>
        </table>
            <?php endif; 
                if(sizeof($resArr) == 0){
                    echo $noResults;
            }
        //require './templates/footer.php';    
        ?>
    </div>
    
    
</body>

    <div id="footer">
        <?php include './templates/footer.php'?>
    </div>
</html>