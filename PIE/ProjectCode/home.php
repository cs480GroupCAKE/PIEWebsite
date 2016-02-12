<!DOCTYPE PHP>
<!--Home page for PIE site. All visitors will see this page. Small introduction and image. Links
to other areas of site included in navigation bar-->
<html>
<head>
    <title>Pie Home</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">       

</head>
<body>
<!-- The class cred is meant to enable us to "move" everything to the top right side of the page so it looks like a normal site for log in. -->
<!-- Added action to form, submit button and required place holders. -->
<div id='container'>
    <div id='header'>
        <div id='cssmenu'>
            <?php include './templates/header.php'?>
        </div>
    
        <div id='headingCenter'>
            <h1>Welcome to Personal Interactive Environment</h1>
            <h2>P.I.E.</h2>
        </div>
    </div>
    <div id='divCenter'>
        <!-- Added line from basic webpage.html -->
        <div id='image'>
            <img class="displayCenter" src="./Images/home_picture.jpg" alt="PIE" style="width:500px;height:250px;">
        </div>

        <h2> Vision Statement</h2>

        <p style="padding-left:200px;padding-right:200px;">Developing a website to aid a section of the elderly community that is facing social isolation. 
           This website will promote social activities and personal outings. Furthermore, 
           the simple design should aid with navigation and scheduling, and more.</p>
    </div>

    <!-- Placeholder for left sidebar -->
    <!--<div id ='divLeft'>
    </div>

    <div id='divRight'>
    </div>-->
    
    <div id='footer'>
        <?php include './templates/footer.php'?>
    </div>
</div>
</body>

</html>



