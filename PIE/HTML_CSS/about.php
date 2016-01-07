<!DOCTYPE PHP>
/*
This file contains the about page. This is a page that can be seen by all visitors of the site.
Contains one image and several tabs (currently three) describing the PIE project. Will still need
significant work before launch adding details to tabbed sections and cleaning style.
*/

<html>
<head>
    <title>About</title>
    
    <link rel="stylesheet" type="text/css" href="template.css">
    <link rel="stylesheet" type="text/css" href="about.css">
    <link rel="stylesheet" type="text/css" href="buttons.css">
    
    <script src="tabs.js"></script>

    <div id='cssmenu'>
        <?php include 'header.php' ?>
    </div>
	
    <h1>Making Outings as Easy as PIE</h1>

</head>

//Loads the tabs section when body of page is loaded.
<body onload="init()">

    <div id='image'>
        <img class="displayCenter" src="pie.jpg" alt="PIE" style="width:400px;height:228px;">
    </div>

    <ul id="tabs">
        <li><a href="#vision">Our Vision</a></li>
        <li><a href="#events">PIE Events</a></li>
        <li><a href="#impact">Impact</a></li>
    </ul>

    <div class="tabContent" id="vision">
        <h2>Vision statement</h2>
        <div>
            <p>Rapidly advancing technology has allowed people to remain connected, 
               even over long distances. However, these changes have also led to an 
               increasingly isolated group: the elderly. As the general population 
               is becoming more mobile, socializing with friends and family is becoming 
               more difficult for this group. This project proposes a simple solution to 
               this problem: the promotion of networking and social outings via an 
               easy-to-use website.</p>
        </div>
    </div>
	
	//This section may change or add least needs content added.
    <div class="tabContent" id="impact">
        <h2>Impact</h2>
        <div>
            <p>Our goal is build stronger communities by making sure the most vunerable
               are not left isolated. We believe that promoting positive social outings
               will have a major impact on the quality of life for all members of society</p>
            <p>Here is an example of the of the impact we have had in Ellensburg, WA</p>
            <p style="color:red">NEED TO ADD MAYBE LATER-----------------------</p>
        </div>
    </div>

	//Possibly link at bottom to show dummy events page.
    <div class="tabContent" id="events">
        <h2>Events</h2>
        <p>Our user created events are meant to strengthen community bonds and reduce
            the negative impacts of social isolation. </p>
        <p>There are a variety of event types from Restaurant outings, to Picnics in
           park, there is something for everyone. Events can be made public and open
           to all or private and only shared with a select few. The event creator is 
           responsible for selecting the appropiate privacy level.</p>
        <p>There are also "Mini-Events". These are located on our Deals page and include
           local deals offered by participating local businesses. The idea here is to create
           a connection between the businesses of the community and its senior residents.</p>
        <p><a href="SampleEvent.html">Here is what a typical Event may look like</a></p>
    </div>

</body>
</html>
