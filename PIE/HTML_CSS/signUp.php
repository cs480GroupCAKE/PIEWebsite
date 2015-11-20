<!DOCTYPE php>
<html>
<body>
	<head><link rel="stylesheet" type="text/css" href="basicWebpage.css"></head>
<h1>Welcome to PIE</h1>


<form action="register.php" method="post">

First Name:<br>
  <input type="text" name="firstname"><!---add required place holders--->
  <br>

Last name:<br>
  <input type="text" name="lastname">
  <br>

Username:<br>
  <input type="text" name="username" required placeholder>
	<a style ="color:red">
	<?php $reasons = array("usernameTaken" => "That username already exists", "blank" => "NAME ERROR"); 
	if ($_GET["signUpFailed"]) echo $reasons[$_GET["reason"]];?>
	</a>
	<br>

Email:<br>
  <input type="text" name="email" required placeholder>
	<a style="color:red">
	<?php $reasons = array("invalidEmail" =>"Email entered is invalid", "blank" => "EMAIL ERROR"); 
	if ($_GET["signUpFailedEmail"]) echo $reasons[$_GET["reason1"]];?>
 	</a>
	<br>

Password:<br>
  <input type="password" name="password" required placeholder>
 	 <br>

Re-enter Password:<br>
  	<input type="password" name="passwordVerify" required placeholder>
	<a style=color:red>
	<?php $reasons = array("passwordsDontMatch" =>"Passwords don't match", "blank" => "Pass Error"); 
	if ($_GET["signUpFailedPassword"]) echo $reasons[$_GET["reason"]];?>
  	</a>
	<br>

Birthday Month:<br>
  <input type="text" name="BdayMM">
  <br>

Birthday Day:<br>
  <input type="text" name="BdayDD"> 
  <br>

Birthday Year:<br>
  <input type="text" name="BdayYYYY">
  <br>

  <input type="submit" name="submit" value="Create Profile">
</form>

</body>
</html>
