<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="template.css">
    <link rel="stylesheet" type="text/css" href="events.css">
    
    <!-- This is used for the date picker -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    
    <div id='cssmenu'>
        <?php include'headerLogged.php'?>

    </div>
    
    <h1>Schedule an Event</h1>

</head>
<body>
    <form>

        <p>Event Name:</p>
        <input type="text" name="eventName">

        <p>Requested Date:</p>
        <input type="text" id="datepicker">

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