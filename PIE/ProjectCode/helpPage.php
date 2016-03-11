<!DOCTYPE PHP>
<html>
<head>
    <title>Help</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php require_once "./background/recaptchalib.php"; 
    session_start()
    ?>
    
</head>

<body>

    <div id='container'>
        <div id='header'>
            <div id='cssmenu'>
                <?php include './background/loggedcheck.php'?>
            </div>
            <h1>Help Page</h1>
        </div>
    
        <div id='body'>
            <div id="divCenter">
                <p>Got a question that was not answered on this page? Send us an email with your question and 
                    we will get back to you as soon as possible!</p>

                <form id="contact-area" action="./background/sendEmail.php" method="POST">
                    <div class="row">
                        <label for="name">Name:</label><br />
                        <input id="name" class="input" name="name" type="text" value="<?php echo $_SESSION['helpname'];?>" 
                        placeholder="Your Name" size="30" onClick="this.value='';"/><br />
                    </div>
                    <br>
                    
                    <div class="row">
                        <label for="subject">Subject:</label><br />
                        <input id="subject" class="input" name="subject" type="text" value="<?php echo $_SESSION['subject'];?>" 
                        placeholder="Subject" size="30" onClick="this.value='';"/><br />
                    </div>
                    <br>
                    
                    <div class="row">
                        <label for="email">Email:</label><br />
                        <input id="email" class="input" name="sender" required placeholder="example@ex.com" type="text" 
                        value="<?php echo$_SESSION['sender']; ?>" size="30" onClick="this.value='';"/><br />
                    </div>
                    <br>
                    
                    <div class="row">
                        <label for="message">Your question:</label><br />
                        <textarea id="message" class="input" name="message" rows="10" cols="31">
                        <?php echo $_SESSION['message'];?>
                        </textarea><br />
                    </div>
                    <br>
                    <input id="button" type="submit" value="Send email"/><div class="g-recaptcha" data-sitekey="6Lf6jRoTAAAAAPSdR8EvEMLKSvB6oDC_5o5ySqlQ"></div>

                </form> 
            </div>
            <!--
            Placeholder for cred
            <div id="cred"></div>
            Placeholder for left sidebar
            <div id="divLeft"></div>-->
        </div>
    
        <div id='footer'>
            <?php include './templates/footer.php'?>
        </div>
    </div>
    
</body>
</html>
