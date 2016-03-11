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
        session_start();
        if(isset($_SESSION['username']) == FALSE) {
            header("Location:./home"); 
            die();
        }
        unset($_SESSION['current_event']);
        $view = False;

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
        
        //Make directories for user if they don't exist.
        if(!file_exists("./userImages/profile/".$current_user."/")) {
            mkdir("./userImages/profile/".$current_user."/");
            mkdir("./userImages/event/".$current_user."/");
            mkdir("./userImages/current/".$current_user."/");
        }
        
        $curdir = "./userImages/current/".$current_user."/";
        $profile_blank = $curdir."profileBlank.jpg";
        
//        echo sizeof($event_id_arr);
        
        
        if(dir_empty($curdir)) {
            copy("./Images/profileBlank.jpg", $profile_blank);
            $setDefault = "INSERT INTO images (username, current) 
                           VALUES('$current_user','$profile_blank');";
            if($database->query($setDefault) === TRUE) {
                //no need to do anything
            } else {
                //echo "Error: ".$profile."<br>".$database->error;
            }
        }
        
        function dir_empty($curdir) {
            if(!is_readable($curdir)) {
                return NULL;
            }
            return (count(scandir($curdir)) == 2);
        }
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
    
    <!--               Slider for events. TN 2/10/16
    
    
    
    
    -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
 
  <script>
  //creates the actual slider using jquery API with modification.
$(function() {
        var s = $("#slider").slider({
            value:0,
            min:0,
            max:10,
            step:1,
            slide: function(event, ui){
               $("#myEvent").val(ui.value);
            }
        }); 
        $("#myEvent").val($("#slider").slider("value")); 
        //enables button to go to previous event
        $("#previous").click(function() {
        s.slider('value', s.slider('value') - s.slider('option', 'step'));
        //shows number of events we are incrementing by.
        $("#myEvent").val($("#slider").slider("value")); 
         });

        //enable the button to go to next event
        $("#next").click(function() {
        s.slider('value', s.slider('value') + s.slider('option','step'));
        //shows number of events we are incrementing by.
        $("#myEvent").val($("#slider").slider("value")); 
        }); 
});
  </script>

</head>

<body onload="init()">

    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include './templates/headerLogged.php' ?>

            </div>
    
            <div id='headingCenter'>
                <h1>Welcome <?php echo $current_user ?>!</h1>
            </div>
        </div>
    
        <div id='body'>
            <!-- Description will go here. Need to update template CSS for positioning. -->
            
            <!-- This is the tabs. Uses the same CSS and script as the about page. -->

            <div id='divCenter'>
                <br/>
                <p>
                <?php
                     if($descRes!=NULL){
                     	$_SESSION['current_d'] = $descRes;
                         echo $descRes;
                     }else{
                         echo "Click Edit Description in the left menu to add your description";
                     } 
                ?>
                </p>
            
                <ul id="tabs">
                    <li><a href="#events">Events</a></li>
                    <li><a href="#instructions">Instructions</a></li>
                    <li><a href="#photos">Event Photos</a></li>
                </ul>
                <!-- Display test -->
                
                <!--<script>
                //Part of code is modified based on how other were able to retrieve data. For testing purposes
                //Not being used.
                // $(document).ready(function() {

                // $("#test").click(function test() {                

                // $.ajax({    //using this to load our profileQueries.php file
                // type: "GET",
                // url: "./background/profileQueries.php",             
                // dataType: "array",               
                // success: function(response){                    
            // $("#display").array(response); 
                // }
                // });
                // });
            // });
                </script>
                -->
                <!--testing display 
                <div  id="display"></div>
                -->
                
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
                                echo "<a>Attending: </a>";
                                $att = explode(":", $current['attending']);
                                echo "<div style='width:250px; height:200px; overflow:scroll; position:relative; left:30%; border-style:double;'>";
                                    foreach($att as $attc) {
                                        echo $attc."<br>";
                                    }
                                echo "</div>";
                                echo "<br>";
                                echo "<a>--Details--</a><br>".$current['details']."<br><br>";
                                echo "-------------------------<br><br>";
                            }
                        }else{
                            echo "No events scheduled";
                        }
                    
                            /*$result = mysqli_query($database, $eventsQ);
                            if (!$result) {
                            echo("Nothing found");
                             }
                            //data converted into array
                            while ($row = mysqli_fetch_assoc($result)){
                            $array_data[] = $row;
                        }
                            //encode the data into array.
                            $json = json_encode($array_data);
                            //displays all events from the database.
                           // echo $json;
                            //for($row=1; $row<=$eventsQ; $row ++){
                                //echo "$username";
                            //}
                            if($eventname !=NULL){
                                $_POST['next'];
                                //echo "$eventdate";
                            }
                       
              /*          </p>
                    <!--    <p>  <php include './background/profileQueries.php' ?>
                        session_start();
                        loop through array with the number of events
                        for($accessEvents=1;$accessEvents<=$events.length();$accessEvents++){
                        echo "one of the events we found in DB is $accessEvents";
                        $_POST['sliderText'];
                        }
                        </p>
                        -->
                <!-- text for the events slider -->
                <p class="sliderText">
                    <label for="myEvent">Upcoming Events:</label>
                    <input type="text" id="myEvent"  readonly style="border:0; color:#FFF; background-color:#006D89; font-weight:bold;">
                </p> 
              
                <div id="slider">
                </div>
                  ?>  
                            <?php 
                            $result = mysqli_query($database, $eventsQ);
                            if ($result == NULL) {
                            echo("Nothing found");
                            }
                            //data converted into array
                            while ($row = mysqli_fetch_assoc($result)){
                            $array_data[] = $row;
                           }
                            //encode the data into array.
                         //   $json = json_encode($array_data);
                            //displays all events from the database.
                            //echo $json;
                            
                            //for($row=1; $row<=$eventsQ; $row ++){
                                //echo "$username";
                            //}
                            
                            if($eventname !=NULL){
                            $_POST['next'];
                            //echo "$eventdate";
                            
                            }
                       */
                      //  </p>
                        
                     //  <p>  
                        
                      /*  
                     <!--- 
                        loop through array with the number of events
                        for($accessEvents=1;$accessEvents<=$events.length();$accessEvents++){
                            echo "one of the events we found in DB is $accessEvents";
                            $_POST['sliderText'];
                        }
                     
                        </p>
                       
                <!-- text for the events slider -->
                <p class="sliderText">
                    <label for="myEvent">Upcoming Events:</label>
                    <input type="text" id="myEvent"  readonly style="border:0; color:#FFF; background-color:#006D89; font-weight:bold;">
                </p> 
                <div id="slider">
                </div>  
            <button name="previous" id="previous" type="submit" >Previous Event</button>
            <button name="next" id="next"type="submit">Next Event</button>
              --->
              */ 
                    ?>
                    </div>
                    
                </div>

                <div class="tabContent" id="instructions">
                    <h2>Navigating Your Profile</h2>
                    <div>
                        <ul>
                            <li id="infoID">To add an event, click the "Events" button found on the left sidebar. Select "Create Event" 
                                            and fill in the form data.</li>
                            <li id="infoID">When you create an event, you will be able to view the details about that event as well as other 
                                            events you might be attending in the "View All Events" button found under "Events" on the sidebar.</li>
                            <li id="infoID">"View All Events" also allows you to edit or delete events after their creation.</li>
                            <li id="infoID">To add or remove a photo, click on the "Edit Profile" button found on the left sidebar and select "Edit Photos". 
                                            You can also manage photos by clicking on the "Edit" icon found on the bottom-right of your current profile picture.</li>
                            <li id="infoID">To edit your profile's description, click on the "Edit Profile" button found on the left sidebar and 
                                            select "Edit Description".</li>
                            <li id="infoID">To find connections, or friends, search for the connection's username using the text area and search button 
                                            located in the center of the header (found on the top of the page).</li>
                            <li id="infoID">While viewing a user's profile, you can add them as a connection with the "Add Contact" button found on the 
                                            top-right of the page (beneath the "Sign Out" button). If you have already added that user, you will 
                                            not see the "Add Contact" button.</li>
                            <li id="infoID">You can view your connections by clicking "View Connections" button found on on the sidebar on the left side of 
                                            the page.</li>
                            <li id="infoID">You can view your notifications by clicking "View Notifications" on the left side of the page. The notifications 
                                            page displays information concerning connection invites and event invites.</li>
                            <li id="infoID">If you have any questions or comments concerning the site, use the "Help" button found on the sidebar on the 
                                            left side of the page. Fill out the form to send an e-mail to the site's developers.</li>
                        </ul>
                        <table>
                            <tr>
                            <td></td>
                        </table>
                    </div>
                </div>

                <div class="tabContent" id="photos">
                    <h2>Event Photos</h2>
                    <!--<p>Add event photos here</p>-->
                    <?php
                        $event_dir = "./userImages/event/".$current_user."/";
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
                <?php
                    $current_dir = "./userImages/current/".$current_user."/";
                    $current_files = glob($current_dir."*.*");
                    
                    echo "<div id='ppcontainer'>";
                    echo "<img id='profilepic' src='$current_files[0]' alt='Profile Picture' >"; //style='max-width:220px;max-height:220px;'
                    echo "<a href='editPhotos'>
                          <img id='editpicbutton' src='./Images/edit_button.png' alt='Edit Pictures'>
                          </a>";
                ?>
                <!--<img src="./Images/profileBlank.jpg" alt="Profile picture" style="width:220px;height:220px;">-->
            
                <div id='cssside'>
                    <ul>
                        <li class='has-sub'><a href='#'>Events</a>
                            <ul>
                                <li><a href='events'>Create Event</a></li>
                                <li><a href='viewAllEvents'>View All Events</a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'>Edit Profile</a>
                            <ul>
                                <li><a href='editPhotos'>Edit Photos</a></li>
                                <li><a href='description'>Edit Description</a></li>
                            </ul>
                        </li>
                        <li><a href='viewConnections'>View Connections</a></li>
                        <li><a href='notices'>View Notifications</a></li>
                        <li><a href='helpPage'>Help</a></li>
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