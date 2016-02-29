<DOCTYPE PHP>
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
    require './database/database.php';
    include './background/profileQueries.php';
?>

<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/events.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <script>
        //This is for the datepicker - it hides previous dates.
        $(function() {
            var currDate = new Date();
            
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                minDate: new Date(currDate.getFullYear(), currDate.getMonth(), currDate.getDate()),
                hideIfNoPrevNext: true
            });
        });

        for(i= new Date().getFullYear(); i>1900; i--)
        {
            $ ('#datepicker').append($('<option/>').val(i).html(i));
        }
        
    </script>

</head>

<body>
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include'./templates/headerLogged.php'?>

            </div>
    
            <h1>Schedule an Event</h1>
        </div>
    
        <div id='body'>
            <form action="./background/updateEventBackground.php" method="post">

                Event Name:<br>
                <input type="text" name="eventname">
                <br><br>

                Date:<br>
                <!-- This will be used for the jQuery calendar datepicker -->
                <input type="text" name="eventdate" id="datepicker" value=<?php echo $eventdate;?>>
                <br><br>
                
                Time:<br>
                <input type="text" name="time">
                <br><br>
            
                Event Details:<br>
                <textarea id="eventdescript" class="input" name="eventdetails" maxlength="5000" rows="10" cols="50"></textarea>
                <br><br>
                <!--<textarea rows="4" cols="50" name="eventdetails">
                </textarea>--> 

                <input id='button' type="submit" name="submit" value="Update Event">
            </form>
            <!--<button onclick="goBack()">Go Back</button>-->

            <script>
                function goBack(){
                    window.history.back();
                }
            </script>
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>

</body>

</html>