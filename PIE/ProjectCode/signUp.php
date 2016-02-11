<!DOCTYPE php>
<?php
/*This page contains the form for the new user sign up. All fields should be required, currently
only a few are to make testing database code easier. Should catch handle and print errors. Incomplete
*/ 
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    
    <meta charset="utf-8">
    <title>Sign Up</title>
    
    <!-- This is used for jQuery date picker
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">-->
    
    <!-- This is the code for the old jQuery calendar event picker
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
            });
        });
        for(i= new Date().getFullYear(); i>1900; i--)
        {
            $ ('#datepicker').append($('<option/>').val(i).html(i));
        }
    </script> -->
    
    <!--This will be used for the javascript dropdown date. Still needs changes in register.php.-->
    <script type="text/javascript">

    /***********************************************
    * Drop Down Date code
    ***********************************************/

        var monthtext=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];

        function populatedropdown(dayfield, monthfield, yearfield) {
            var today=new Date();
            var dayfield=document.getElementById(dayfield);
            var monthfield=document.getElementById(monthfield);
            var yearfield=document.getElementById(yearfield);
            var thisyear=today.getFullYear();
            //var isLeapYear=false;
        
            for (var y=0; y<100; y++) {
                yearfield.options[y]=new Option(thisyear, thisyear);
                thisyear-=1;
            }
            
            for (var m=0; m<12; m++)
                monthfield.options[m]=new Option(monthtext[m], monthtext[m]);
                
            for (var i=1; i<32; i++)
                dayfield.options[i]=new Option(i, i+1);
                
            /*//Should switch for months to account for days in each; use isLeapYear on Feb. This doesn't work.
            switch (document.getElementById("monthdropdown").options[document.getElementById("monthdropdown").selectedIndex]) {
                case '0': 
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case '1':
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case '2':
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "3":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "May":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Jun":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Jul":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Aug":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Sept":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Oct":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Nov":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                case "Dec":
                    for (var i=1; i<32; i++)
                        dayfield.options[i]=new Option(i, i+1);
                    break;
                default:
                    break;
            }*/
            
            dayfield.options[today.getDate()]=new Option(today.getDate(), today.getDate(), true, true); //select today's day
            monthfield.options[today.getMonth()]=new Option(monthtext[today.getMonth()], monthtext[today.getMonth()], true, true); //select today's month
            yearfield.options[0]=new Option(today.getFullYear(), today.getFullYear(), true, true); //select today's year
        }

    </script>
    
            
    <div id='cssmenu'>
        <?php include './templates/header.php' ?>
    </div>
    <h1>Welcome to PIE</h1>
</head>

<body onload="init()">
    <form action="./background/register.php" method="post">
        First Name:
        <br>
        <input type="text" name="firstname"><!---add required place holders--->
        <br>
        <br>
        Last name:
        <br>
        <input type="text" name="lastname">
        <br>
        <br>
        Username:
        <br>
        <input type="text" name="username" required placeholder>
        <br>
        <a style ="color:red">
            <?php $reasons = array("usernameTaken" => "That username already exists", 
                "blank" => "NAME ERROR"); 
                if ($_GET["signUpFailed"]) echo "\n";echo $reasons[$_GET["reason"]]; echo "\n";
            ?>
        </a>
        
        <br>
        Email:
        <br>
        <input type="text" name="email" required placeholder>
        <br>
        <a style="color:red">
            <?php $reasons = array("invalidEmail" =>"Email entered is invalid", "blank" => "EMAIL ERROR"); 
                if ($_GET["signUpFailedEmail"]) echo $reasons[$_GET['reason1']]; ?>

        </a>
        
        <br>
        Password:
        <br>
        <input type="password" name="password" required placeholder>
        <br>
        <br>
        Re-enter Password:
        <br>
        <input type="password" name="passwordVerify" required placeholder>
        <br>
        <a style=color:red>
            <?php $reasons = array("passwordsDontMatch" =>"Passwords don't match", "blank" => "Pass Error"); 
                if ($_GET["signUpFailedPassword"])echo "\n"; echo $reasons[$_GET["reason"]];?>
        </a>

        <br>    
        Birth Date: 
        <!-- This is the code for the old jQuery datepicker calendar
        <p><input type="text" name="dob" id="datepicker"></p>-->
        
        <!-- This will be used for the javascript date dropdown -->
        <br>
        <select id="daydropdown" name="day">
        </select> 
        <select id="monthdropdown" name="mos">
        </select> 
        <select id="yeardropdown" name="year">
        </select>
        <br>
            
        <script type="text/javascript">
            //populatedropdown(id_of_day_select, id_of_month_select, id_of_year_select)
            window.onload=function(){
                populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
            }
        </script>
        
        
        <br>
        <input type="submit" name="submit" value="Create Profile" class="big button blue">
    </form>

</body>
</html>
