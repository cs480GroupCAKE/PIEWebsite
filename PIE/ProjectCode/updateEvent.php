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
    session_start();
    require './database/database.php';
    include './background/profileQueries.php';
    $current = array();
    $current = $_SESSION['current_event'];
    $details = $current['details'];
    $date = explode("-",$current['date']);
    $date_formatted = $date[1]."/".$date[2]."/".$date[0];
    
    echo $_SESSION['delete'];
?>

<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/events.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <script src="./popup.js"></script>
    
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
            <form action="./background/createEvent.php" method="post">

                Event Name:<br>
                <input type="text" name="eventname" value="<?php echo $current['eventname'];?>" required>
                <br><br>

                Date:<br>
                <!-- This will be used for the jQuery calendar datepicker -->
                <input type="text" name="eventdate" id="datepicker" value="<?php echo $date_formatted;?>" required>
                <br><br>
                
                Time:<br>
                <input type="text" name="time" value="<?php echo $current['time'];?>" placeholder='Enter time'>
                <br><br>
                
                Location:<br>
                <input type="text" name="location" value="<?php echo $current['location'];?>" required>
                <br><br>
            
                Event Details:<br>
                <textarea id='eventdescript' class='input' name='eventdetails' maxlength='500' 
                rows='10' cols='50'><?php echo $current['details'];?></textarea>
                <br><br>
                <!--<textarea rows="4" cols="50" name="eventdetails">
                </textarea>--> 

                <input id='button' type="submit" name="submit" value="Update Event">
            </form>
            <!--<button onclick="goBack()">Go Back</button>-->

                        <!-- This is used for the connection invites for events -->
            <div id='invpopupDiv'>
                <div id='popupInnerDiv'>
                    <form action='#' id='popupform' method='post' name='invpopupform'><!--enctype='multipart/form-data'-->
                        <img id='close' src='./Images/close_button.png' onclick='invite_div_hide()'>
                        <h2>Invite Connections</h2>
                        <hr><br><br>
                        <!-- add inputs here -->
                        <br><br><br>
                        <!-- reference this in connection adding php -->
                        <input type='submit' value='Invite' name='submit'>
                    </form>
                </div>
            </div>
        
        <button id='popupbutton' onclick='invite_div_show()'>Invite Connections</button>

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