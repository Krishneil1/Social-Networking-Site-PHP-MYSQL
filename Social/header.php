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
        "<link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>".
        "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>".
        "</head><body><div class = 'container'>".
        "<div class = 'appname'> $appname$userstr</div>".
        "<script src = 'javascript.js'></script>";
    if($loggedin)
    {
        echo"<br>". 
		      "<nav class = 'navbar navbar-default'>".
    			     "<div class='container-fluid'>".
                        "<div class='navbar-header'>".
                            "<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>".
                             "<span class='icon-bar'></span>".
                             "<span class='icon-bar'></span>".
                             "<span class='icon-bar'></span>".                        
                             "</button>".
                             "<a class='navbar-brand' href='index.php'>Social Network</a>".
                        "</div>".
                        "<div class='collapse navbar-collapse' id='myNavbar'>". 				    
            			     "<ul class = 'nav navbar-nav'>".
            //                    "<li class ='active'> <a href= '#'>Home</a></li>".
                                "<li><a href='members.php?view=$user'><b>Social Network</b></a></li>".
                                "<li class='dropdown'>".
                                    "<li><a href='members.php'>Members</a></li>".
                                    "<li><a href='friends.php'>Friends</a></li>".
                                    "<li><a href='messages.php'>Messages</a></li>".
                                    "<li><a href='profile.php'>Edit Profile</a></li>" .
                                    "<li><a href='logout.php'>Log out</a></li>".
                                "</li>".
            			     "</ul>".
            			     "<ul class='nav navbar-nav navbar-right'>".
                                "<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Out</a></li>".
                  		    "</ul>".
                        "</div>".
                    "</div>".
		      "</nav>".
	       "<br>";
    }
    else
    {
        echo"<br>". 
		      "<nav class = 'navbar navbar-default'>".
			     "<div class='container-fluid'>".
				    "<a class='navbar-brand' href='index.php'><b>Social Network</b></a>".
			     "</dvi>".
			     "<ul class = 'nav navbar-nav'>".
//                    "<li class ='active'> <a href= '#'>Home</a></li>".
			     "</ul>".
			     "<ul class='nav navbar-nav navbar-right'>".
                    "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>".
                    "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>".
      		    "</ul>".
		      "</nav>".
	       "<br>";
    }
?>