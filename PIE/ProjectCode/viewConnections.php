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
    $contact;
    $format1 = "<a href='./viewProfile.php?vusername=";
    $format2 = "'>View Profile</a><br>";
?>
<html>
<head>
    <title>Search Results</title>

    <?php require './background/connectionsQueries.php';?>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">

</head>

<body>

    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include './background/loggedcheck.php';?>
            </div>
        </div>
    
        <div id='body'>
            <div id='divCenter'>
                <h2>Search Results</h2>
                <br>
                <?php if(sizeof($resArr) != 0): ?>
                <table id='cen-table'>
                    <thead>
                        <tr>
                            <th>contact</th><th>link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //TESTING LEAVE IN echo sizeof($resArr);
                            for($i=0; $i<sizeof($resArr);$i++):
                                $contact = $resArr[$i];
                                $link = $format1.$contact.$format2;
                        ?>
                        <tr> 
                            <td><?php echo $contact;?></td><td><?php echo $link;?>
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
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>
      
</body>
</html>