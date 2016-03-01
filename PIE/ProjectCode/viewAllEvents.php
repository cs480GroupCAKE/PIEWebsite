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
?>

<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <div id='cssmenu'>
        <?php require './background/loggedcheck.php';
              require './background/profileQueries.php';?>
    </div>
</head>

<body>
    
    <div class='divCenter'>
        <h2>Events</h2>
        <?php if(sizeof($eventArr) != 0): ?>
        <table class='cen-table'>
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Date</th><th>Attending</th><th>Edit</th><th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //TESTING LEAVE IN echo sizeof($connArr);
                    for($i=0; $i<sizeof($eventArr);$i++):
                        $id = $eventArr[$i]['eventid'];
                        $name = $eventArr[$i]['eventname'];
                        $date = $eventArr[$i]['date'];
                        $attending = "tobeimplemented";
                        $edit = "<a href='./background/grabEvent.php?id=".$id."'>Edit</a>";
                        $delete = "<a href='removeEvent.php?id='$id''>Delete</a>";
                ?>
                <tr> 
                    <td><?php echo $id;?></td><td><?php echo $name;?></td>
                    <td><?php echo $date;?></td><td><?php echo $attending;?></td>
                    <td><?php echo $edit;?></td><td><?php echo $delete;?></td>
                </tr>
                    
                <?php endfor; ?>
            </tbody>
        </table>
            <?php endif; 
                if(sizeof($eventArr) == 0){
                    echo "No events";
            }  
        ?>
    </div>
    
    
</body>


    <div id='footer'>
        <?php include './templates/footer.php'?>
    </div>
</html>