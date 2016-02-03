<!DOCTYPE PHP>
<html>
<head>
    <title>Events</title>
    
    <link rel="stylesheet" type="text/css" href="template.css">
    <link rel="stylesheet" type="text/css" href="events.css">
    
    <div id='cssmenu'>
        <!--<?php include'headerLogged.php'?>-->

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

</head>
<body>
    <form>

        <p>Event Name:</p>
        <input type="text" name="eventName">

        <p>Event Date:</p>
        <form action="" name="eventDate">
        <select id="daydropdown">
    </select> 
        <select id="monthdropdown">
    </select> 
        <select id="yeardropdown">
    </select> 
    
    </form>

    <script type="text/javascript">
        //populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
        window.onload=function(){
        populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
        }
    </script>
        <p>Time:</p>
        <input type="text" name="time">
    </form>
		<p>Event Details:</p>
    <!--<textarea rows="4" cols="50"> -->
	<input type="text" name="eventDetails">

		<!--Enter your event details here. -->
   <!-- </textarea> -->

    <br>    
    <button type="button">Submit</button>

    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack(){
        window.history.back();
        }
    </script>


</body>

</html>