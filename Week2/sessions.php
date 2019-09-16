<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["username"] = "myusername";
$_SESSION["password"] = "mypassword";
echo "Session variables are set.";


if (!isset($_SESSION['username']))
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
