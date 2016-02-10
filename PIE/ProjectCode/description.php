<!DOCTYPE php>
<?php
/*
  This page contains the form for editing profile descriptions. Currently only has a form to fill in a description of up to 500 characters.
  Should catch handle and print errors and have a countdown for the number of characters entered. Also needs a second php page to handle 
  adding the description to the user database.  Incomplete
*/ 
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    
    <meta charset="utf-8">
    <title>Sign Up</title>
    
    <div id='cssmenu'>
        <?php include './templates/headerLogged.php'?>
    </div>
    
    <h1>Edit Description</h1>
</head>

<body onload="init()">
    <form action="./background/editdescription.php" method="post">
        Description:
        <br>
        <textarea id="description" class="input" name="description" maxlength="500" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" name="submit" value="Add Description" class="big button blue">
    </form>
</body>
</html>