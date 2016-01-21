<!DOCTYPE PHP>
<!--Home page for PIE site. All visitors will see this page. Small introduction and image. Links
to other areas of site included in navigation bar-->
<html>
<head>
    <title>Pie Home</title>
    <link rel="stylesheet" type="text/css" href="buttons.css">
    <link rel="stylesheet" type="text/css" href="template.css">       
    
    <div id='cssmenu'>
        <?php include 'header.php'?>
    </div>
    
    <h1>Welcome to PIE</h1>
</head>

<body>
<!-- The class cred is meant to enable us to "move" everything to the top right side of the page so it looks like a normal site for log in. -->
<!-- Added action to form, submit button and required place holders. -->
    <div id='divRight'>
    </div>

    <!-- Placeholder for left sidebar -->
    <div id ='divLeft'>
    </div>

    <!-- Added line from basic webpage.html -->
    <div id='image'>
        <img class="displayCenter" src="homepic.png" alt="PIE" style="width:304px;height:228px;">
    </div>

    <h2> Vision Statement</h2>

    <p>Developing a website to aid a section of the elderly community that is facing social isolation. 
       This website will promote social activities and personal outings. Furthermore, 
       the simple design should aid with navigation and scheduling, and more.</p>

</body>

</html>



