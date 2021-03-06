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
<!--
This file contains the profile page of users that are being viewed by their connections. This page will be populated through information 
stored in the database. Currently needs links and access to the viewed users data.
-->

<html>
<head>
    <?php 
        session_start();
        if(isset($_SESSION['username'])){
            $current_user = $_SESSION['username'];
        }else{
            header("Location:./about");
            exit;
        }
        
        if(isset($_GET['vusername'])){
            $vusername = $_GET['vusername'];
        }
        
        include './background/viewingQueries.php';
        include './background/connectionsQueries.php';
        if($vusername == NULL){
            header('Location:searchError.php');
        }
        $_SESSION['vusername'] = $vusername;
        
       
    ?>
    <title>View Profile</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">
    <!-- Could use this for sign out button <link rel="stylesheet" type="text/css" href="buttons.css"> -->
    <link rel="stylesheet" type="text/css" href="./stylesheets/about.css"> <!-- Used for tabs -->
    <link rel="stylesheet" href="./stylesheets/sidebar.css">
    
    <script src="tabs.js"></script>
    
    <!-- This is used for the jQuery menu -->
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="sidebar.js"></script>

</head>

<body onload="init()">

    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include './templates/headerLogged.php'; ?>
            </div>
            <div id='headingCenter'>
                <h1>Viewing <?php echo $vusername."'s profile"; ?></h1>
            </div>
        </div>
    
        <div id='body'> 
            <!--button will need to change to fit styling of rest site-->
            <div id='divRight'>
                <h3><?php 
                    $found = FALSE;
                    $pending = FALSE;
                    for($i = 0; $i<count($resArr); $i++){
                        if($resArr[$i][0] == $vusername){
                            $found = TRUE;
                            if($resArr[$i][1] == 'Y'){                            
                                $pending = TRUE;
                            }
                            break;
                        }
                    }
                    if($found==TRUE){
                        if($pending==TRUE){
                            echo "Contact Pending";
                        }else{
                            echo "Contact Added";
                        }
                    }else{
                        echo "<form action = './background/addContact.php'><input id='button' type='submit' value='Add Contact'></form>";
                    }
                ?></h3>
            </div>

            <div id='divCenter'>
                <br/>
                <p>
                <?php
                    if($descRes!=NULL){        
                        echo $descRes;
                    }else{
                        echo "No description entered yet!";
                    }                
                ?> 
                </p>
            
                <ul id="tabs">
                    <!-- These may have to be set to hide depending on public/private profiles -->
                    <li><a href="#events">Events</a></li>
                    <li><a href="#instructions">Instructions</a></li>
                    <li><a href="#photos">Event Photos</a></li>
                </ul>

                <div class="tabContent" id="events">
                    <h2>Events</h2>
                    <div>
                        <p><?php 
                            if($eventArr[0]!=NULL){
                            foreach($eventArr as $current){
                            if($current['eventname'] == NULL){continue;}
                                echo "<a>Name: </a>".$current['eventname']."<br>";
                                echo "<a>Created By: </a>".$current['username']."<br>";
                                echo "<a>Location: </a>".$current['location']."<br>";
                                echo "<a>Date: </a>".$current['date']."<br>";
                                echo "<a>Time: </a>".$current['time']."<br>";
                                echo "<a>Attending: </a><br>".$current['attending']."<br><br>";
                                echo "<a>--Details--</a><br>".$current['details']."<br><br>";
                                echo "-------------------------<br><br>";
                            }
                        }else{
                            echo "No events scheduled";
                        }
                       ?></p>
                    </div>
                </div>

                <div class="tabContent" id="instructions">
                    <h2>Viewing Profiles</h2>
                    <div>
                        <ul>
                            <li id="infoID">To get back to your profile page, click the "Home" button located in the top-left
                                            corner of the page.</li>
                            <li id="infoID">If a user is in your connections, you can view all of their profile pictures, 
                                            their connections, and their events.</li>
                            <li id="infoID">All of these options can be found on the sidebar on the left side of the page.</li>
                            <li id="infoID">To add this person to your connections, click the "Add Contact" button found on the 
                                            top-left of this page (below the "Sign Out" button).</li>
                            <li id="infoID">More options will be allowed if a user is added to your connections.</li>
                            <li id="infoID">If you have any questions, comments, or concerns, do not hesitate to e-mail our 
                                            project team by using one of the "Help" buttons, which can be found on the top-left
                                            of the page (Next to "About") or on the bottom of the sidebar on the left side of the
                                            page.</li>
                        </ul>
                        <table>
                            <tr>
                            <td></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="tabContent" id="photos">
                    <h2>Event Photos</h2>
                    <!--<p>Add event photos here</p>-->
                    <?php
                        $event_dir = "./userImages/event/".$vusername."/";
                        $event_images = glob($event_dir."*.*");
                        
                        
                        if(ev_empty($event_dir)) {
                            echo 'No event photos available';
                        } else {
                            echo '<table id="eptable">';
                            for($i=0; $i<count($event_images); $i++) {
                                echo '<tr>';
                                echo '<td id="evimg"><img src="'.$event_images[$i].'" style="max-width:430px; max-height:800px;" alt="Event Image '.$i.'" id="eventimg"><br><br></td></tr>';
                            }
                            echo '</table>';
                        }
                        
                        function ev_empty($event_dir) {
                            if(!is_readable($event_dir)) {
                                return NULL;
                            }
                            return (count(scandir($event_dir)) == 2);
                        }
                    ?>
                </div>
            </div>
            
            <!-- This is the dropdown menu. Needs links to each page. CSS will need changing for color and font. -->
            <div id='divLeft'>
            
                <!-- Viewed user's profile pictures and information may be loaded from the database -->
                <?php
                    $current_dir = "./userImages/current/".$vusername."/";
                    $current_files = glob($current_dir."*.*");
                    
                    echo "<img src='$current_files[0]' alt='Profile Picture' style='max-width:220px;max-height:220px;'>"
                ?>
                <!--<img src="./Images/profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">-->
            
                <div id='cssside'>
                    <ul>
                        <li><a href='#'>View Pictures</a></li>
                        <li><a href='#'>View Connections</a></li>
                        <li class='has-sub'><a href='#'>View Events</a>
                            <ul>
                                <li><a href='#'>Upcoming Events</a></li>
                                <li><a href='#'>Past Events</a></li>
                            </ul>
                        </li>
                        <li><a href='./helpPage'>Help</a></li>
                    </ul>
                </div>
            </div>
            

            
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>

</body>
</html>
