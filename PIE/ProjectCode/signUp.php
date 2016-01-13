<!DOCTYPE php>
<?php
/*This page contains the form for the new user sign up. All fields should be required, currently
only a few are to make testing database code easier. Should catch handle and print errors. Incomplete
*/ 
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="template.css">
        <link rel="stylesheer" type="text/css" href="buttons.css">
            
        <div id='cssmenu'>
            <?php include 'header.php' ?>
        </div>
        <h1>Welcome to PIE</h1>
    </head>

    <body>
            First Name:<br>
            <input type="text" name="firstname"><!---add required place holders--->
            <br>

            Last name:<br>
            <input type="text" name="lastname">
            <br>

            Username:<br>
            <input type="text" name="username" required placeholder>
	    <a style ="color:red">
	        <?php $reasons = array("usernameTaken" => "That username already exists", 
                "blank" => "NAME ERROR"); 
	            if ($_GET["signUpFailed"]) echo $reasons[$_GET["reason"]];?>
	    </a>
	    <br>

            Email:<br>
            <input type="text" name="email" required placeholder>
	    <a style="color:red">
	        <?php $reasons = array("invalidEmail" =>"Email entered is invalid", "blank" => "EMAIL ERROR"); 
	            if ($_GET["signUpFailedEmail"]) echo $reasons[$_GET["reason1"]];?>
 	    </a>
	    <br>

            Password:<br>
            <input type="password" name="password" required placeholder>
 	    <br>

            Re-enter Password:<br>
  	    <input type="password" name="passwordVerify" required placeholder>
	    <a style=color:red>
	        <?php $reasons = array("passwordsDontMatch" =>"Passwords don't match", "blank" => "Pass Error"); 
	            if ($_GET["signUpFailedPassword"]) echo $reasons[$_GET["reason"]];?>
  	    </a>
            <br>
            
            Birthday Month:<br>
            <input type="text" name="BdayMM">
            <br>

            Birthday Day:<br>
            <input type="text" name="BdayDD"> 
            <br>

            Birthday Year:<br>
            <input type="text" name="BdayYYYY">
            <br>

           <input type="submit" name="submit" value="Create Profile" class="big button blue">
        </form>
    </body>
</html>
