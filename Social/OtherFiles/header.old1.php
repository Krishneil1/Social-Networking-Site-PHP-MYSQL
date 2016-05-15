<?php
    session_start();
    echo"<!DOCTYPE html>\n <html> <head>";
    require_once 'functions.php';
    $userstr = '(Guest)';
    if(isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $loggedin=TRUE;
        $userstr = " ($user)";
    }
    else $loggedin = FALSE;
    
    echo"<title> $appname$userstr</title><link rel='stylesheet'".
        "href='styles.css' type = 'text/css'>".
        "<link rel='stylesheet' href='css/bootstrap.min.css'".
        "</head><body><div class = 'container'><center><canvas id = 'logo' width= '624'".
        "height=''96'>$appname</canvas></center>".
        "<div class = 'appname'> $appname$userstr</div>".
        "<script src = 'javascript.js'></script>";
    if($loggedin)
    {
        echo"<br>". 
		      "<nav class = 'navbar navbar-default'>".
			     "<div class='container-fluid'>".
				    "<a class='navbar-brand' href='#'>Social Network</a>".
			     "</dvi>".
			     "<ul class = 'nav navbar-nav'>".
                    "<li class ='active'> <a href= '#'>Home</a></li>".
                    "<li><a href='members.php?view=$user'>Home</a></li>".
                    "<li><a href='members.php'>Members</a></li>".
                    "<li><a href='friends.php'>Friends</a></li>".
                    "<li><a href='messages.php'>Messages</a></li>".
                    "<li><a href='profile.php'>Edit Profile</a></li>" .
                    "<li><a href='logout.php'>Log out</a></li>".
			     "</ul>".
			     "<ul class='nav navbar-nav navbar-right'>".
                    "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Out</a></li>".
      		    "</ul>".
		      "</nav>".
	       "<br>";
    }
    else
    {
        echo"<br>". 
		      "<nav class = 'navbar navbar-default'>".
			     "<div class='container-fluid'>".
				    "<a class='navbar-brand' href='#'>Social Network</a>".
			     "</dvi>".
			     "<ul class = 'nav navbar-nav'>".
                    "<li class ='active'> <a href= '#'>Home</a></li>".
 //                   "<li><a href='index.php'>Home</a></li>".
                    "<li><a href='signup.php'> Sign up </a></li>" .
                    "<li><a href='login.php'> Log in </a></li>".
			     "</ul>".
			     "<ul class='nav navbar-nav navbar-right'>".
                    "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>".
                    "<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>".
      		    "</ul>".
		      "</nav>".
	       "<br>";
    }

?>