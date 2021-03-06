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
    <title>Notices</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <?php require './background/noticeQueries.php' ?>
    <div id='cssmenu'>
        <?php require './background/loggedcheck.php';
              include './background/connectionsQueries.php';?>
    </div>
</head>

<body>
    
    <div class='divCenter'>
        <h2>Notifications</h2>
        <?php if(sizeof($connArr) != 0): ?>
        <table class='cen-table'>
            <thead>
                <tr>
                    <th>Notice</th><th>Sender</th><th>View</th><th>Accept</th><th>Decline</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //TESTING LEAVE IN echo sizeof($connArr);
                    for($i=0; $i<sizeof($connArr);$i++):
                        $notice = $connArr[$i]['notice'];
                        $sender = $connArr[$i]['sender'];
                        $accept = $connArr[$i]['accept'];
                        $decline = $connArr[$i]['decline'];
                        $view = $connArr[$i]['view'];
                ?>
                <tr> 
                    <td><?php echo $notice;?></td><td><?php echo $sender;?></td>
                    <td><?php echo $view;?></td><td><?php echo $accept;?></td>
                    <td><?php echo $decline;?></td>
                </tr>
                    
                <?php endfor; ?>
            </tbody>
        </table>
            <?php endif; 
                if(sizeof($connArr) == 0){
                    echo $noResults;
            }
        //require './templates/footer.php';    
        ?>
        
        <h2>Sent Connection Requests</h2>
        <?php if(sizeof($pendArr) != 0): ?>
        <table class='cen-table'>
            <thead>
                <tr>
                    <th>Notice</th><th>Sent To</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //TESTING LEAVE IN echo sizeof($pendArr);
                    for($i=0; $i<sizeof($pendArr);$i++):
                       // if($resArr[$i][0]=='Y'){//{continue;}
                            $notice = "Pending Connection";
                            $sentTo = $pendArr[$i];
                            $status = "Pending";
                      //  }
                ?>
                <tr> 
                    <td><?php echo $notice;?></td><td><?php echo $sentTo;?></td>
                    <td><?php echo $status;?></td>
                </tr>
                    
                <?php endfor; ?>
            </tbody>
        </table>
            <?php endif; 
                if(sizeof($pendArr) == 0){
                    echo "No sent connections pending";
            }
        //require './templates/footer.php';    
        ?>
    </div>
    
    
</body>


    <div id='footer'>
        <?php include './templates/footer.php'?>
    </div>
</html>