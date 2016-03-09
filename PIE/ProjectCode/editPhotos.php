<!DOCTYPE PHP>
<?php
/*
KEEP IN CODE AND COMMENTED OUT UNLESS DEBUGGING

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('dispaly_startup_errors', '1');
echo ini_get('display_errors');
*/
?>

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

<?php
    //This will be used when I add the image directory/name to the database
    require './database/database.php';
    session_start();
/*    if(isset($_SESSION['username'])) {
        echo 'Session Active'.$_SESSION['username'];
    }
*/
    //Need username for everything
    $username = $_SESSION['username'];

/*    //Make directories for user if they don't exist.
    mkdir("./userImages/profile/".$username."/");
    mkdir("./userImages/event/".$username."/");
    mkdir("./userImages/current/".$username."/");*/
?>

<div id='container'>
    <div id='header'>
        <div id='cssmenu'>
            <?php include'./templates/headerLogged.php'?>
        </div>
    </div>
    
    <div id='divCenter'>
        
        <!-- *****************************************************************
             *             Here is profile photo upload popup                *
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
            <!-- Popup div for event photo upload starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for event photo upload -->
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
             *            Here is profile photo removal popup                *
             *                       CH 2.13.2016                            *
             *****************************************************************
        -->
        <div id='rpppopupDiv'>
            <!-- Popup div for profile photo removal starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo removal -->
                <form action='./background/ppRemove.php' id='popupform' method='post' name='rempppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remPP_div_hide()'>
                    <h2>Remove Profile Photos</h2>
                    <hr><br><br>
                    <!-- This is where I display current photos and a checkbox next to each for removal -->
                    <?php
                        //This will be used when I add the image directory/name to the database
                        //require './database/database.php';
                        /*session_start();
                        if(isset($_SESSION['username'])) {
                            echo 'Session Active'/$_SESSION['username'];
                        }*/

                        //Need username for everything
                        //$username = $_SESSION['username'];
                    
                        $files = glob("./userImages/profile/".$username."/*.*");

                        echo '<table id="phototb">';
                        for($i=0; $i<count($files); $i++) {
                            $image = $files[$i];
                            echo '<tr>';
                            echo '<td id="tbcheck"><input type="checkbox" id="ppcb'.$i.'" name="ppcb'.$i.'"></td>
                                  <td id="tbpic"><label for="ppcb'.$i.'"><img src="'.$image.'" alt="Image '.$i.'" 
                                  id="profileimg" name="ppcb'.$i.'" /></label></td></tr>';
                        }
                        echo '</table>';
                    ?>
                    <!-- Need to write a new check_empty() for checking text boxes are selected -->
                    <!-- Need to find a way to send checkbox id's to ppRemove.php -->
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
            <!-- Popup div for event photo removal starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for event photo removal -->
                <form action='./background/epRemove.php' id='popupform' method='post' name='remeppopupform'>
                    <img id='close' src='./Images/close_button.png' onclick='remEP_div_hide()'>
                    <h2>Remove Event Photos</h2>
                    <hr><br><br>
                    <!-- This is where I display current photos and a checkbox next to each for removal -->
                    <?php
                        //This will be used when I add the image directory/name to the database
                        //require './database/database.php';
                        /*session_start();
                        if(isset($_SESSION['username'])) {
                            echo 'Session Active'/$_SESSION['username'];
                        }*/

                        //Need username for everything
                        //$username = $_SESSION['username'];
                    
                        $files = glob("./userImages/event/".$username."/*.*");

                        echo '<table id="phototb">';
                        for($i=0; $i<count($files); $i++) {
                            $image = $files[$i];
                            echo '<tr>';
                            echo '<td id="tbcheck"><input type="checkbox" id="epcb'.$i.'" name="epcb'.$i.'"></td>
                                  <td id="tbpic"><label for="epcb'.$i.'"><img src="'.$image.'" alt="Image '.$i.'" 
                                  id="eventimg" name="epcb'.$i.'" /></label></td></tr>';
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

        <!-- *****************************************************************
             *             Here is profile photo setting popup               *
             *                      CH 2.25.2016                             *
             *****************************************************************
        -->
        <div id='spppopupDiv'>
            <!-- Popup div for profile photo setting starts here -->
            <div id='popupInnerDiv'>
                <!-- Form for profile photo setting -->
                <form action='./background/ppSet.php' id='popupform' method='post' name='setpppopupform'><!--enctype='multipart/form-data'-->
                    <img id='close' src='./Images/close_button.png' onclick='setPP_div_hide()'>
                    <h2>Select Profile Photo</h2>
                    <hr><br><br>
                    <!-- This is where I display current photos and a radio button next to each for setting -->
                    <?php
                        //This will be used when I add the image directory/name to the database
                        //require './database/database.php';
                        /*session_start();
                        if(isset($_SESSION['username'])) {
                            echo 'Session Active'/$_SESSION['username'];
                        }*/

                        //Need username for everything
                        //$username = $_SESSION['username'];
                    
                        $files = glob("./userImages/profile/".$username."/*.*");

                        echo '<table id="phototb">';
                        for($i=0; $i<count($files); $i++) {
                            $image = $files[$i];
                            echo '<tr>';
                            echo '<td id="tbradio"><input type="radio" id="sprb'.$i.'" name="sprb" value="sprb'.$i.'"></td>
                                  <td id="tbpic"><label for="sprb"><img src="'.$image.'" alt="Image '.$i.'" 
                                  id="profileimg" name="sprb" /></label></td></tr>';
                        }
                        echo '</table>';
                    ?>
                    <input type='submit' value='Set Profile Photo' name='submit'>
                    <br><br>
                </form>
            </div>
        </div>

        <h1>Edit Images</h1>
        
        <p>The largest image you may upload is 500KB due to limited space.
        <br> 
        You may upload the following image formats: jpeg, jpg, png, and gifs.
        </p>

        <button id='popupbutton' onclick='addPP_div_show()'>Add Profile Photos</button>
        <button id='popupbutton' onclick='addEP_div_show()'>Add Event Photos</button>
        <br><br>
        <button id='popupbutton' onclick='remPP_div_show()'>Remove Profile Photos</button>
        <button id='popupbutton' onclick='remEP_div_show()'>Remove Event Photos</button>
        <br><br>
        <button id='popupbutton' onclick='setPP_div_show()'>Select Profile Photo</button>
    </div>
    
    <div id='footer'>
        <?php include'./templates/footer.php'?>
    </div>
</div>
</body>
</html>