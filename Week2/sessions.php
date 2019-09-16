<?php
// Start the session
session_start();


    if (isset($_GET['login']))  {
     
        // process the login request
        if (isset($_POST['username'])) $_SESSION["username"] = $_POST['username'];
        if (isset($_POST['password'])) $_SESSION["password"] = MD5($_POST['password']);
       
    }else if(isset($_GET['logout'])) {
      session_destroy();
      $message = "You have logged out of the system. Hope to see you again.";
      print "<meta http-equiv=\"refresh\" content=\"0;URL=?message={$message}\">";
    }

?>
<!DOCTYPE html>
<html>
<body>

<a href="?logout=yes">logout</a>

<?php


if (isset($_SESSION["username"]))
{
  echo "Your username is " . $_SESSION["username"];
}
else
{
  echo "You are not logged in!";
}
 
?>

<div align="center">
    <h1>Welcome to CSE2102 </h1>
     <p>To proceed, please login.</p>
        <form action="?login=yes" method="post" enctype="multipart/form-data" name="login" target="_self">
        <label>Username: </label><input name="username" id="username" type="text" />
        <label>Password: </label><input name="password" id="password" type="password" />
        <input name="submit" type="submit" value="Login" />
      </form>
</div>
</body>
</html>
