<?php
session_start();
if(isset($_SESSION['uname']))
{
    echo $_SESSION['uname'];
} 
?>

<html>
<body>
<h1>Congrats! User is created!!</h1>
<br>
<br>
<a href="signUp.php">Click Here to Sign Up</a><br>
<a href="login.php">Click Here to Login In</a>
</body>
</html>