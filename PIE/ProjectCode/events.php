<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="template.css">
    <link rel="stylesheet" type="text/css" href="events.css">
    
    <div id='cssmenu'>
        <!--<?php include'headerLogged.php'?> -->

    </div>
    
    <h1>Schedule an Event</h1>

</head>
<body>
    <form>

        <p>Event Name:</p>
        <input type="text" name="eventName">

        <p>Requested Date:</p>
        <input type="text" name="requestDate">

        <p>Time:</p>
        <input type="text" name="time">
    
        <p>Event Details:</p>
        <input type="text" name="eventDetails">
    </form>

    <button type="button">Submit</button>

    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack(){
        window.history.back();
        }
    </script>


</body>

</html>