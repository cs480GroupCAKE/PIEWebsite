<!DOCTYPE PHP>
<html>
<head>
    <!-- *****************************************************************
         *      This file will be used for displaying photo edits.       *
         *                         CH 2.12.2016                          *
         *****************************************************************
    -->
    <title>Edit Images</title>
    <link rel="stylesheet" type="text/css" href="./stylesheets/template.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/buttons.css">
    <link rel="stylesheet" type="text/css" href="./stylesheets/popup.css">
    <script src="./popup.js"></script>
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
        
        <!-- *****************************************************************
             *                 Here is photo upload popup                    *
             *                      CH 2.12.2016                             *
             *****************************************************************
        -->  
        <div id='pppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='#' id='popupform' method='post' name='pppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='addPP_div_hide()'>
                    <h2>Upload Profile Photo</h2>
                    <hr>
                    <input id='inputtext' name='ppuploadtext' placeholder='Profile Photo' type='text'>
                    <br><br><br>
                    <a href='javascript:%20ppcheck_empty()' id='submit'>Submit</a>
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *              Here is event photo upload popup                 *
             *                        CH 2.13.2016                           *
             *****************************************************************
        -->  
        <div id='eppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='#' id='popupform' method='post' name='eppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='addEP_div_hide()'>
                    <h2>Upload Event Photo</h2>
                    <hr>
                    <input id='inputtext' name='epuploadtext' placeholder='Event Photo' type='text'>
                    <br><br><br>
                    <a href='javascript:%20epcheck_empty()' id='submit'>Submit</a>
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *                Here is photo removal popup                    *
             *                       CH 2.13.2016                            *
             *****************************************************************
        -->  
        <div id='rempppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='#' id='popupform' method='post' name='rempppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remPP_div_hide()'>
                    <h2>Remove Profile Photos</h2>
                    <hr>
                    <!-- This is where I'll need to display current photos and a checkbox next to each for removal
                    <input id='inputtext' name='ppuploadtext' placeholder='Profile Photo' type='text'>
                    -->
                    <br><br><br>
                    <!-- Need to write a new check_empty() for checking text boxes are selected -->
                    <a href='javascript:%20remppcheck_empty()' id='submit'>Remove Selected Photos</a>
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *              Here is event photo removal popup                *
             *                        CH 2.13.2016                           *
             *****************************************************************
        -->  
        <div id='remeppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='#' id='popupform' method='post' name='remeppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remEP_div_hide()'>
                    <h2>Remove Event Photos</h2>
                    <hr>
                    <!-- This is where I'll need to display current event photos and a checkbox next to each for removal
                    <input id='inputtext' name='ppuploadtext' placeholder='Profile Photo' type='text'>
                    -->
                    <br><br><br>
                    <!-- Need to write a new check_empty() for checking text boxes are selected -->
                    <a href='javascript:%20remepcheck_empty()' id='submit'>Remove Selected Photos</a>
                </form>
            </div>
        </div>
        
        <h1>Edit Images</h1>
        
        <button id='popupbutton' onclick='addPP_div_show()'>Add Profile Photos</button>
        <button id='popupbutton' onclick='addEP_div_show()'>Add Event Photos</button>
        <br><br>
        <button id='popupbutton' onclick='remPP_div_show()'>Remove Profile Photos</button>
        <button id='popupbutton' onclick='remEP_div_show()'>Remove Event Photos</button>
    </div>
    
    <div id='footer'>
        <?php include'./templates/footer.php'?>
    </div>
</div>
</body>
</html>