<?php
    require_once 'header.php';
    
    echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  <div class='container-fluid'>
  <h3> Thanks for Signing up and bringing your awesomeness</h3>
  <h4>Please enter your details to sign up</h4>
_END;

  $error = $user = $email = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $email = sanitizeString($_POST['email']);

    if ($user == "" || $pass == ""|| $email == "")
      $error = "Not all fields were entered<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass','email')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }
    }
  }

  echo <<<_END
    <form role = 'form' method='post' action='signup.php'>$error
    <div class = 'form-group'>
     <label for="email">User Name:</label>
    <input type='text'class="form-control"  maxlength='16' name='user' value='$user'
      onBlur='checkUser(this)'><span id='info'></span><br>
    </div>
    <div class = 'form-group'>
     <label for="password">Password:</label>
    <input type='text'class="form-control"  maxlength='16' name='pass' value='$pass'
    </div></br>
    <div class = 'form-group'>
     <label for="email">Email:</label>
    <input type='text'class="form-control"  maxlength='50' name='email' value='$email'
    </div></br>
_END;
?>
    <button type="submit" class="btn btn-default" value='Sign up'>Submit</button>
    </form></div><br>
  </body>
</html>
