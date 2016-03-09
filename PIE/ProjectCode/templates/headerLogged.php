<!DOCTYPE PHP>
<link rel="stylesheet" type="text/css" href="./stylesheets/profile.css">
<html>
    <head>
        <ul>
            <li><a href="./profile">Home</a></li>
            <li><a href="./about">About</a></li>
            <li><a href="./helpPage">Help</a></li>
            
            <ul style="float:right; list-style-type:none;">
                <li style="border-left: 1px solid #ffffff; min-height:65px;"><a href="./background/signout.php">Sign Out</a></li>
            </ul>

            <font color="white" style="padding-right:130px;">Search for Connections:</font>
            <form action="./searchResults.php" method="post">
                <input type="text" name="searchedUser">
                <input type="submit" value="Search" name="submit"><font style="padding-right:130px;"></font>
            </form>
            
        </ul>
        
    </head>
</html>
