<!DOCTYPE PHP>
<!--This is the sample event page. It will be used to display a sample event 
in order to give an idea of the layour of events and how they work. -->

<html>
<head>
    <title>Sample Event</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">

</head>

<body onload="init()">
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php require './background/loggedcheck.php'; ?>
            </div>
            
            <h1>Sample Event</h1>
        </div>
        
        <div id='divCenter'>
            <div id='body'>
                <div id='image'>
                    <img src="./Images/sample_event.png" alt="Sample Event" style="position:relative; right:100px;">
                    <br><br>
                    <p><a href="./about.php" style="color:blue; text-decoration:underline;">Back</a></p>
                </div>
            </div>
        </div>
        
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
        
    </div>
</body>
</html>