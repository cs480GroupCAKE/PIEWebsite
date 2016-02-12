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
This file contains the profile page. This page will be populated through information stored in the database.
Currently needs links and header added and repositioning.
-->

<html>
<head>
    <?php 
        $view = False;
        session_start();
        /*Code for debugging
        if(isset($_SESSION['username'])){
            echo "Session Active".$_SESSION['username'];
        }
        */
        require './database/database.php';
        include './background/profileQueries.php';
        $current_user = $_SESSION['username'];
        //$user_description = $_SESSION['description'];
        //$username = mysqli_real_escape_string($database,$_REQUST['username']);
    ?>
    <title>Profile</title>
    
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

    <div id='cssmenu'>

        <?php include './templates/headerLogged.php' ?>

    </div>
    
    <div id='headingCenter'>
        <h1>Welcome <?php echo $current_user ?>!</h1>
    </div>
	
	    
	<!--               Slider for events. TN 2/10/16
    
    
    
    
    -->
    
    
    <style>
        <!-- Prevents slides from flashing -->
        #slides {
            display:none;
        }
    </style>
    
<!-- javascript that enables us to use the slider -->

    <script src="http://code.jquery.com/jquery-latest.min.js">
    </script>

    <script src="jquery.slides.min.js">
    </script>

    <script>
        $(function(){
            $("#slides").slidesjs({
                width: 200,
                height: 200
            });
        });
    </script>


</head>

<body onload="init()">

    <!-- Description will go here. Need to update template CSS for positioning. -->
    
    <!-- This is the tabs. Uses the same CSS and script as the about page. -->

    <div id='divCenter'>
        <br/>
        <p>
        <?php
             if($descRes!=NULL){
                 echo $descRes;
             }else{
                 echo "Click Edit Description in the left menu to add your description";
             } 
        ?>
        </p>
    
        <ul id="tabs">
            <li><a href="#events">Events</a></li>
            <li><a href="#charts">Charts</a></li>
            <li><a href="#photos">Event Photos</a></li>
        </ul>

        <div class="tabContent" id="events">
            <h2>Events</h2>
            <div>
                <p><?php 
                if($eventname!=NULL){
                    echo "Event Name: $eventname<br>";
                    echo "Date: $eventdate <br>";
                    echo "Details: $eventdetails<br><br>";
                }else{
                    echo "No events scheduled";
                }
                ?></p>
            </div>
        </div>

        <div class="tabContent" id="charts">
            <h2>Charts</h2>
            <div>
                <p>Add charts here</p>
            </div>
        </div>

        <div class="tabContent" id="photos">
            <h2>Event Photos</h2>
            <p>Add event photos here</p>
        </div>
    </div>
    
    <!-- This is the dropdown menu. Needs links to each page. CSS will need changing for color and font. -->
    <div id='divLeft'>
    
        <img src="./Images/profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">
    
        <div id='cssside'>
            <ul>
                <li><a href='events.php'>Create Event</a></li>
                <li class='active has-sub'><a href='#'>Edit Profile</a>
                    <ul>
                        <li><a href='#'>Edit Photos</a></li>
                        <li><a href='description.php'>Edit Description</a></li>
                    </ul>
                </li>
                <li><a href='#'>View Connections</a></li>
                <li><a href='#'>Help</a></li>
            </ul>
        </div>
    </div>

	
    <div id="slides">
        <img src="pc.jpeg/940x528">
        <img src="cwu_test.jpeg">
        <img src="http://placehold.it/940x528">
        <img src="http://placehold.it/940x528">
        <img src="http://placehold.it/940x528">

    </div>
	
</body>
</html>
