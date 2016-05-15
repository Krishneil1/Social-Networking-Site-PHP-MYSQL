<?php
	session_start();
	echo "<!Doctype html><html><head>";
	require_once 'functions.php';
	$userstr = '(Guest)';
	if(isset($_session['user']))
	{
		$user = $_session['user'];
		$logged = True;
		$userstr = "($user)";
	}
	else $loggedin = False;
	echo "<title>$appname$userstr</title>
	<link rel='stylesheet' " ."href='styles.css' type='text/css'>" .
	//<!-- Latest compiled and minified CSS -->
	"<link rel='stylesheet' " ."href='css/bootstrap.css' type='text/css'>".
	//<!-- Latest compiled JavaScript -->
	"<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>".
	//<!-- jQuery library -->
	"<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>".
	"</head><body><center><canvas id='logo' width='624' " .
	"height='96'>$appname</canvas></center>" .
	"<div class='appname'>$appname$userstr</div>" ;
	if ($loggedin)
	echo ("<nav class='navbar navbar-default'>" .
	"<div class='container-fluid'>".
	"<div class='navbar-header'>".
	"<a class='navbar-brand' href='index.php'>Social Network</a> </div>".
	"<ul class='nav navbar-nav'>".
	"<li><a href='members.php?view=$user'>Home</a></li>".
	"<li><a href='members.php'>Members</a></li>".
	"<li><a href='friends.php'>Friends</a></li>".
	"<li><a href='messages.php'>Messages</a></li>".
	"<li><a href='profile.php'>Edit Profile</a></li>" .
	"<li><a href='logout.php'>Log out</a></li></ul></div></nav>");
	else
	echo ("<nav class='navbar navbar-default'>" .
	"<div class='container-fluid'>".
	"<div class='navbar-header'>".
	"<a class='navbar-brand' href='index.php'>Social Network</a> </div>".
	"<ul class='nav navbar-nav'>".
	"<li><a href='index.php'>Home</a></li>".
	"<li><a href='signup.php'> Sign up </a></li>" .
	"<li><a href='login.php'> Log in </a></li></ul></div></nav>");
?>