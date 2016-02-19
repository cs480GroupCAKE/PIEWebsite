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
                <form action='./background/ppUpload.php' id='popupform' method='post' name='pppopupform' enctype='multipart/form-data'>
                    <img id='close' src='./Images/close_button.png' onclick='addPP_div_hide()'>
                    <h2>Upload Profile Photo</h2>
                    <hr><br><br>
                    <input id='ppuploadfile' name='ppuploadfile' placeholder='Profile Photo' type='file'>
                    <br><br><br>
                    <input type='submit' value='Upload Image' name='submit'>
                    <!--<a href='javascript:%20ppcheck_empty()' id='submit'>Submit</a>-->
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *              Here is event photo upload popup                 *
             *                        CH 2.13.2016                           *
             *****************************************************************
        -->  
        <div id='peppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='./background/epUpload.php' id='popupform' method='post' name='eppopupform' enctype='multipart/form-data'>
                    <img id='close' src='./Images/close_button.png' onclick='addEP_div_hide()'>
                    <h2>Upload Event Photo</h2>
                    <hr><br><br>
                    <input id='epuploadfile' name='epuploadfile' placeholder='Event Photo' type='file'>
                    <br><br><br>
                    <input type='submit' value='Upload Image' name='submit'>
                    <!--<a href='javascript:%20epcheck_empty()' id='submit'>Submit</a>-->
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *                Here is photo removal popup                    *
             *                       CH 2.13.2016                            *
             *****************************************************************
        -->  
        <div id='rpppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='./background/ppRemove.php' id='popupform' method='post' name='rempppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remPP_div_hide()'>
                    <h2>Remove Profile Photos</h2>
                    <hr><br><br>
                    <!-- This is where I'll need to display current photos and a checkbox next to each for removal -->
                    <?php
                        $files = glob("./userImages/profile/*.*");

                        echo '<table id="phototb">';
                        for($i=0; $i<count($files); $i++) {
                            $image = $files[$i];
                            echo '<tr>';
                            echo '<td id="tbcheck"><input type="checkbox" name="picbox"></td><td id="tbpic"><img src="
                                 '.$image.'" alt="Image $i" id="profileimg" /></td></tr>';
                        }
                        echo '</table>';
                    ?>
                    <!-- Need to write a new check_empty() for checking text boxes are selected -->
                    <input type='submit' value='Remove Selected Photos' name='submit'>
                    <br><br>
                    <!--<a href='javascript:%20remppcheck_empty()' id='submit'>Remove Selected Photos</a>-->
                </form>
            </div>
        </div>
        
        <!-- *****************************************************************
             *              Here is event photo removal popup                *
             *                        CH 2.13.2016                           *
             *****************************************************************
        -->  
        <div id='reppopupDiv'>
            <!-- Popup div for profile photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo upload -->
                <form action='./background/epRemove.php' id='popupform' method='post' name='remeppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remEP_div_hide()'>
                    <h2>Remove Event Photos</h2>
                    <hr><br><br>
                    <!-- This is where I'll need to display current photos and a checkbox next to each for removal -->
                    <?php
                        $files = glob("./userImages/event/*.*");

                        echo '<table id="phototb">';
                        for($i=0; $i<count($files); $i++) {
                            $image = $files[$i];
                            echo '<tr>';
                            echo '<td id="tbcheck"><input type="checkbox" name="picbox"></td><td id="tbpic"><img src="
                                 '.$image.'" alt="Image $i" id="eventimg" /></td></tr>';
                        }
                        echo '</table>';
                    ?>
                    <!-- Need to write a new check_empty() for checking text boxes are selected -->
                    <input type='submit' value='Remove Selected Photos' name='submit'>
                    <br><br>
                    <!--<a href='javascript:%20remepcheck_empty()' id='submit'>Remove Selected Photos</a>-->
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