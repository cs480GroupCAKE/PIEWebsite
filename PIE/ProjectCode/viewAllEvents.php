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
    <title>View Events</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">

        <?php 
              require './background/profileQueries.php';
              require './background/connectionsQueries.php';
              session_start();
        ?>
</head>

<body>
    <div id='container'>
    
    <div id='header'>
        <div id='cssmenu'>
            <?php require './background/loggedcheck.php'; ?>
        </div>
    </div>
    
    <div id='body'>
    <div class='divCenter'>
        <h2>Events</h2>
        <?php if(sizeof($eventArr) != 0): ?>
        <table class='cen-table'>
            <thead>
                <tr>
                    <th>Name</th><th>Date</th><th>Location</th><th>Attending</th><th>Edit/View</th><th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //TESTING LEAVE IN echo sizeof($connArr);
                    for($i=0; $i<sizeof($eventArr);$i++):
                        $id = $eventArr[$i]['eventid'];
                        $name = $eventArr[$i]['eventname'];
                        $date = $eventArr[$i]['date'];
                        $location = $eventArr[$i]['location'];
                        //$attending = "tobeimplemented";
                        $edit = "<a href='./background/grabEvent.php?id=".$id."'>Edit/View</a>";
                        $delete = "<a href='./background/grabEvent.php?id=".$id."&d=t'>Delete</a>";
                ?>
                <tr> 
                    <td><?php echo $name;?></td><td><?php echo $date;?></td>
                    <td><?php echo $location;?></td>
                    
                    <td><?php 
                            echo "<select>";
                            echo "<option value='none'>None</option>";
                                      /*
                                      for($j=0; $j<sizeof($resArr); $j++) {
                                          echo "<option value='c".$j."' style='min-width:30px;'>".$resArr[$j][0]."</option>";
                                      }*/
                                  echo "</select>";
                        ?></td>
                    
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
    
    <script type="text/javascript">
    /*
        var checkList = document.getElementById('dropcheck');
        checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
            if(checkList.classList.contains('visible')) {
                checkList.classList.remove('visible');
            } else {
                checkList.classList.add('visible');
            }
        }
        
        checkList.onblur = function(evt) {
            checkList.classList.remove('visible');
        }*/
    </script>
    </div>
        <div id='footer'>
        	<?php include './templates/footer.php'?>
    	</div>
    </div>
</body>



</html>