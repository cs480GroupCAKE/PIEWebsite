<!DOCTYPE PHP>
<!--
This file contains the profile page. This page will be populated through information stored in the database.
Currently needs links and header added and repositioning.
-->

<html>
<head>
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
        <!-- We will need a different header if we want to keep consistency but have a "logout" button
        <?php include 'header.php' ?>
        -->
    </div>
    
    <h1>Welcome back!</h1>

</head>

<body onload="init()">
    
	<!-- This is the dropdown menu. Needs links to each page. CSS will need changing for color and font. -->
	<div id='divLeft'>
        <div id='cssside'>
	
	        <img src="profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">
		
            <ul>
                <li><a href='#'>Create Event</a></li>
                <li class='active has-sub'><a href='#'>Edit Profile</a>
                    <ul>
		    		    <li class='has-sub'><a href='#'>Edit Photos</a></li>
                        <li class='has-sub'><a href='#'>Edit Description</a></li>
                    </ul>
                </li>
		    	<li class='active has-sub'><a href='#'>Connections</a>
                    <ul>
		    		    <li class='has-sub'><a href='#'>Add Connection</a></li>
                        <li class='has-sub'><a href='#'>View Connections</a></li>
                    </ul>
                </li>
                <li><a href='#'>Help</a></li>
            </ul>
        </div>
	</div>
	
	<!-- Description will go here. Need to update template CSS for positioning. -->
	
	<!-- This is the tabs. Uses the same CSS and script as the about page. -->
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

</body>
</html>