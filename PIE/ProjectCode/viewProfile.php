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
stored in the database. Currently needs links and access to the viewed user's data.
-->

<html>
<head>
    <?php 

        require 'database.php';
        include 'profileQueries.php';
        $current_user = $_SESSION['username'];
        //$viewed_user = 
        //$user_description = $_SESSION['description'];
        //$username = mysqli_real_escape_string($database,$_REQUST['username']);
    ?>
    <title>View Profile</title>
    
    <link rel="stylesheet" type="text/css" href="template.css">
    <!-- Could use this for sign out button <link rel="stylesheet" type="text/css" href="buttons.css"> -->
    <link rel="stylesheet" type="text/css" href="about.css"> <!-- Used for tabs -->

    <script src="tabs.js"></script>
    
    <!-- This is used for the jQuery menu -->
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="sidebar.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="sidebar.js"></script>

    <div id='cssmenu'>

        <?php include 'headerLogged.php' ?>

    </div>
    
    <h1>Viewed username<?php //echo $viewed_user ?></h1>

</head>

<body onload="init()">

    <div id='divCenter'>
        <br/>
        <p>
        <?php// echo $descRes; Change this to viewed user's description ?>
        </p>
    
        <ul id="tabs">
            <!-- These may have to be set to hide depending on public/private profiles -->
            <li><a href="#events">Events</a></li>
            <li><a href="#charts">Charts</a></li>
            <li><a href="#photos">Event Photos</a></li>
        </ul>

        <div class="tabContent" id="events">
            <h2>Events</h2>
            <div>
                <p><?php// echo "Event Name: $eventname"?></p>
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
    
        <!-- Viewed user's profile pictures and information may be loaded from the database -->
        <img src="profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">
    
        <div id='cssside'>
            <ul>
                <li><a href='#'>View Pictures</a></li>
                <li><a href='#'>View Connections</a></li>
                <li class='active has-sub'><a href='#'>View Events</a>
                    <ul>
                        <li><a href='#'>Upcoming Events</a></li>
                        <li><a href='#'>Past Events</a></li>
                    </ul>
                </li>
                <li><a href='#'>Help</a></li>
            </ul>
        </div>
    </div>
    
</body>
</html>