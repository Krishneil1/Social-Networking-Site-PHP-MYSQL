<?php
require_once 'header.php';
echo "<br> <span class = 'main'>Welcome to $appname,";
if($loggedin)echo "<div class = 'container'>Welcome , $user" ."</div>";
else echo "Please <a href='signup.php'> signup </a> and /or <a href='login.php'>log in </a>to join in.";
 ?>
<!DOCTYPE html lang="en">
<html>
<head>

</head>
<body>
</body>
</html>
