<!DOCTYPE PHP>
<!--
This file contains the profile page. This page will be populated through information stored in the database.
Currently needs links and header added and repositioning.
-->

<html>
<head>
    <?php 
        require 'database.php';
        session_start();
        $current_user = $_SESSION['username'];
        //$username = mysqli_real_escape_string($database,$_REQUST['username']);
    ?>
    <title>Profile</title>
    
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
    
    <h1>Welcome back <?php echo $current_user ?>!</h1>

</head>

<body onload="init()">

    <!-- Description will go here. Need to update template CSS for positioning. -->
    
    <!-- This is the tabs. Uses the same CSS and script as the about page. -->

    <div id='divCenter'>
        <br/>
        <p>This is where the user description will go. We can add a form to a page linked to the "Edit Description" tab
           in the sidebar that will submit the user's description to the user database.</p>
    
        <ul id="tabs">
            <li><a href="#events">Events</a></li>
            <li><a href="#charts">Charts</a></li>
            <li><a href="#photos">Event Photos</a></li>
        </ul>

        <div class="tabContent" id="events">
            <h2>Events</h2>
            <div>
                <p>Events will be posted here</p>
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
    
        <img src="profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">
    
        <div id='cssside'>
            <ul>
                <li><a href='#'>Create Event</a></li>
                <li class='active has-sub'><a href='#'>Edit Profile</a>
                    <ul>
                        <li><a href='#'>Edit Photos</a></li>
                        <li><a href='#'>Edit Description</a></li>
                    </ul>
                </li>
                <li class='active has-sub'><a href='#'>Connections</a>
                    <ul>
                        <li><a href='#'>Add Connection</a></li>
                        <li><a href='#'>View Connections</a></li>
                    </ul>
                </li>
                <li><a href='#'>Help</a></li>
            </ul>
        </div>
    </div>

    <?php session_destroy(); ?>
    
</body>
</html>