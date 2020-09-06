<?php
session_start();
if(isset($_SESSION['uname']))
{
    echo $_SESSION['uname'];
    $user=$_SESSION['uname'];
    echo $user;
}
?>

<html>
<body>
<h1>You do not show the symptoms of Coronavirus/h1>
<br>
<br>
<a href="signUp.php">Click Here to Sign Up</a><br>
<a href="login.php">Click Here to Login In</a>
</body>
</html>