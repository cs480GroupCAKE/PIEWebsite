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
    <?php 
    session_start();
    $current_desc = $_SESSION['current_d']; 
    ?>
    
    <meta charset="utf-8">

</head>

<body onload="init()">

    <div id='container'>
        <div id='header'>
            <title>Sign Up</title>
    
            <div id='cssmenu'>
                <?php include './templates/headerLogged.php'?>
            </div>
    
            <h1>Edit Description</h1>
        </div>
        
        <div id='body'>
            <form action="./background/editdescription.php" method="post">
                Description:
                <br>
                <textarea id="description" class="input" name="description" 
                maxlength="500" rows="10" cols="50"><?php echo $current_desc;?></textarea>
                <br><br>
                <input id="button" type="submit" name="submit" value="Add Description">
            </form>
        </div>
        
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>

</body>
</html>