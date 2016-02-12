<!DOCTYPE PHP>
<html>
<head>
    <title>Edit Images</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
</head>

<body>
<!--    <form action="./background/createEvent.php" method="post">  -->
<div id='container'>
    <div id='header'>
        <div id='cssmenu'>
            <?php include'./templates/headerLogged.php'?>
        </div>
    </div>
    
    <div id='divCenter'>
        <h1>Edit Images</h1>
        
        <button id='popupbutton' onclick='addPP_div_show'>Add Profile Photos</button>
        <button id='popupbutton' onclick='addEP_div_show'>Add Event Photos</button>
        <br><br>
        <button id='popupbutton' onclick='remPP_div_show'>Remove Profile Photos</button>
        <button id='popupbutton' onclick='remEP_div_show'>Remove Event Photos</button>
    </div>
    
    <div id='footer'>
        <?php include'./templates/footer.php'?>
    </div>
</div>
</body>
</html>