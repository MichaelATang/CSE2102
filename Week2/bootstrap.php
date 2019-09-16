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

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Bootstrap</title>
  </head>
  
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>
</html>
