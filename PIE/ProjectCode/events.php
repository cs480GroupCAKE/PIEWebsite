<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/events.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <script src="./popup.js"></script>
    
    <?php
        require './background/connectionsQueries.php';
        session_start();
    ?>

    <!-- I think we should stick to one events page (unless there is another one that does 
    something different?).  ---TN 2/2/16 6:41 PM---
    I ended up commenting this code  because it is easy for a user to enter an invalid date
    for their event...
    This is used for the date picker 
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
            });
        });
    </script>
    
    -->

<!-- This is the old script for date dropdowns
        <script type="text/javascript">

        /***********************************************
        * Drop Down Date code
        ***********************************************/

        var monthtext=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

        function populatedropdown(dayfield, monthfield, yearfield){
            var today=new Date()
            var dayfield=document.getElementById(dayfield)
            var monthfield=document.getElementById(monthfield)
            var yearfield=document.getElementById(yearfield)
            
            for (var i=0; i<31; i++)
                dayfield.options[i]=new Option(i, i+1)
            
            dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true) //select today's day
        
            for (var m=0; m<12; m++)
                monthfield.options[m]=new Option(monthtext[m], monthtext[m])
            
            monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true) //select today's month
        
            var thisyear=today.getFullYear()
        
            for (var y=0; y<20; y++){
                yearfield.options[y]=new Option(thisyear, thisyear)
                thisyear+=1
            }
        
        yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true) //select today's year
         
        }

    </script>
-->

<!-- End of the slider -->


    <!-- This is used for jQuery date picker. Still needs updates in createEvent.php. -->
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
            <form action="./background/createEvent.php" method="post">

                *Event Name:<br>
                <input type="text" name="eventname" placeholder='Event Name' required>
                <br><br>

                *Date:<br>
                <!-- This will be used for the jQuery calendar datepicker -->
                <input type="text" name="eventdate" id="datepicker" placeholder='Select Date' required>
                <br><br>

                <!-- Old scipt for dropdown date selection
                <select id="daydropdown" name="day">
                </select> 
                <select id="monthdropdown" name="mos">
                </select> 
                <select id="yeardropdown" name="year">
                </select> 
                <br><br>

                <script type="text/javascript">
                    //populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
                    window.onload=function(){
                        populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
                    }
                </script>
                -->
                
                Time:<br>
                <input type="text" name="time" placeholder='Event Time'>
                <br><br>
                
                *Location:<br>
                <input type="text" name="location" required placeholder="Event Location" required>
                <br><br>
            
                Event Details:<br>
                <textarea id="eventdescript" class="input" name="eventdetails"
                placeholder='Enter Event Details' maxlength="500" rows="10" cols="50"></textarea>
                <br><br>
                <!--<textarea rows="4" cols="50" name="eventdetails">
                </textarea>--> 

                Invites:<br>
                    <div style="width:250px; height:200px; overflow:scroll; position:relative; left:35%; border-style:double;">
                        <table id="conntb">
                        <?php
                            for($i=0; $i<count($resArr); $i++) {
                                $contact = $resArr[$i][0];
                                echo '<tr>';
                                echo '<td id="ctcheck"><input type="checkbox" id="ctcb'.$i.'" name="ctcb[]" value="'.$contact.'"></td>
                                      <td id="ctname"><label for="ctcb'.$i.'">'.$contact.'</label></td></tr>';
                            }
                        ?>
                        </table>
                    </div>
                <br><br>

                <input id='button' type="submit" name="submit" value="Create Event">
		<br><br><br><br><br>
                <div id='copyright'> 
                Text boxes that have "*" next to them are required fields.
                </div>
            </form>
            <!--<button onclick="goBack()">Go Back</button>-->

            <!-- This is used for the connection invites for events -->
            <!--<div id='invpopupDiv'>
                <div id='popupInnerDiv'>
                    <form action="#" id='popupform' name='invpopupform'><enctype='multipart/form-data'-->
                        <!--<img id='close' src='./Images/close_button.png' onclick='invite_div_hide()'>
                        <h2>Invite Connections</h2>
                        <hr><br><br>
                        <table id="conntb">
                        <?php
                            for($i=0; $i<count($resArr); $i++) {
                                $contact = $resArr[$i][0];
                                echo '<tr>';
                                echo '<td id="ctcheck"><input type="checkbox" id="ctcb'.$i.'" name="ctcb[]" value="'.$contact.'"></td>
                                      <td id="ctname"><label for="ctcb'.$i.'">'.$contact.'</label></td></tr>';
                            }
                        ?>
                        </table>
                        <br><br><br>-->
                        <!-- reference this in connection adding php
                        <input type='submit' value='Invite' name='submit'> -->
                    <!--</form>
                </div>
            </div>-->
        
        <!--<button id='popupbutton' onclick='invite_div_show()'>Invite Connections</button>-->
	<br><br><br><br><br>
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