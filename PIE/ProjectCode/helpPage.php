<!DOCTYPE PHP>
<html>
<head>
    <title>Help</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    
        <div id='cssmenu'>
            <?php include './background/loggedcheck.php'?>
        </div>
    <h1>Help Page</h1>
</head>

<body>
    <div id="center">
        <p>Got a question that wasn't answered on this page? Send us an email with your question and 
            we will get back to you as soon as possible!</p>

        <form id="contact-area" action="./background/sendEmail.php" method="POST">
            <div class="row">
                <label for="name">Name:</label><br />
                <input id="name" class="input" name="name" type="text" value="Your Name" size="30" onClick="this.value='';"/><br />
            </div>
            <br>
            
            <div class="row">
                <label for="subject">Subject:</label><br />
                <input id="subject" class="input" name="subject" type="text" value="Subject" size="30" onClick="this.value='';"/><br />
            </div>
            <br>
            
            <div class="row">
                <label for="email">Email:</label><br />
                <input id="email" class="input" name="sender" type="text" value="example@somewhere.com" size="30" onClick="this.value='';"/><br />
            </div>
            <br>
            
            <div class="row">
                <label for="message">Your question:</label><br />
                <textarea id="message" class="input" name="message" rows="10" cols="31"></textarea><br />
            </div>
            <br>
            
            <input id="submit_button" type="submit" value="Send email" class="big button blue"/>
        </form> 
    </div>
    
    <!-- Placeholder for cred -->
    <div id="cred"></div>
    <!-- Placeholder for left sidebar -->
    <div id="divLeft"></div>
</body>
</html>
