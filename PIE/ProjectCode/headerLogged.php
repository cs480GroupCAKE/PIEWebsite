<!DOCTYPE PHP>
<html>
    <head>
        <ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="helpPage.php">Help</a></li>
            
            <!--TODO: MAKE SURE TO HAVE THE SIGN OUT BUTTON ACTUALLY SIGN USERS OUT Z.R. 1/25/16-->
            <ul style="float:right; list-style-type:none;">
                <li style="border-left: 1px solid #ffffff"><a href="signout.php">Sign Out</a></li>
            </ul>

            <font color="white" style="padding-right:130px;">Search for Connections:</font>
            <form action="searchUser.php" method="post">
                <input type="text" name="searchedUser">
                <input type="submit" value="Search" name="submit"><font style="padding-right:130px;"></font>
            </form>
            
        </ul>
        
    </head>
</html>