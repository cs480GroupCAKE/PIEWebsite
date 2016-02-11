<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/events.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    
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
    <div id='cssmenu'>
        <?php include'./templates/headerLogged.php'?>

    </div>
    
    <h1>Schedule an Event</h1>
	
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
	
	<!--				Slider for events. TN 2/10/16 							
	
	
	
	
	-->
	
	
	<style>
    /* Prevents slides from flashing */
    #slides {
      display:none;
    }
	</style>
	
<!-- javascript that enables us to use the slider -->

	<script src="http://code.jquery.com/jquery-latest.min.js">
	</script>
	
	<script src="jquery.slides.min.js">
	</script>

	<script>
		$(function(){
		  $("#slides").slidesjs({
			width: 200,
			height: 200
		  });
		});
    </script>

<!-- End of the slider -->
</head>

<body>

	<div id="slides">
		<a href="http://www.cwu.edu/publicity/reuniting-families-torn-apart-incarceration-mothers-day-california-prisons">
		<img src="cwu building test.jpeg">
		</a>	
		<img src="cwu_test.jpeg">
		<img src="http://placehold.it/940x528">
		<img src="http://placehold.it/940x528">
		<img src="http://placehold.it/940x528">
	
	</div>

    <form action="./background/createEvent.php" method="post">

        <p>Event Name:</p>
        <input type="text" name="eventname">

        <p>Requested Date:</p>
        <!--<input type="text" id="datepicker"> -->
	
        <select id="daydropdown" name="day">
    </select> 
        <select id="monthdropdown" name="mos">
    </select> 
        <select id="yeardropdown" name="year">
    </select> 
    

		
	<script type="text/javascript">
        //populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
        window.onload=function(){
        populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
        }
    </script>

        <p>Time:</p>
        <input type="text" name="time">
    
        <p>Event Details:</p>
		  <textarea rows="4" cols="50" name="eventdetails">
		   </textarea> 

	
	<br>

    <input type="submit" name="submit" value="Create Event" class="big button blue">
    </form>
    <!--<button onclick="goBack()">Go Back</button>-->

    <script>
        function goBack(){
            window.history.back();
        }
    </script>


</body>

</html>