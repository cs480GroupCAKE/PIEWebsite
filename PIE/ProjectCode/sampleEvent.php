<!DOCTYPE PHP>
<!--This is the sample event page. It will be used to display a sample event 
in order to give an idea of the layour of events and how they work. -->

<html>
<head>
    <title>Sample Event</title>
    
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">

</head>

<body onload="init()">
    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php require './background/loggedcheck.php'; ?>
            </div>
        </div>
        
        <div id='body'>
            <h1>Sample Event</h1>
                <div id='image'>
                    <img class="displayCenter" src="./Images/sample_event.png" alt="Sample Event" style="width:937.555px;height:246.5px;">
                </div>
                <br><br><br>
                <button id='button' onclick="location='./about'">Back</button>
                <!-- <a href="./about" style="color:blue; text-decoration:underline;">Back</a></p>
                --->
        </div>
        
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
        
    </div>
</body>
</html>