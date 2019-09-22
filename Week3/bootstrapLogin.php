<?php

// Start the session
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "password";
try {
  $conn = new PDO("mysql:host=$servername;dbname=employees", $dbusername);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  if (isset($_GET['login'])) {
    // process the login request
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = $conn->query("SELECT first_name FROM employees WHERE first_name = '{$username}' AND last_name = '{$password}' LIMIT 1");
    foreach ($result as $row) {
      $userid = $row['first_name'];
    }
  
    
  } else if (isset($_GET['logout'])) {
    session_destroy();
    $message = "You have logged out of the system. Hope to see you again.";
    print "<meta http-equiv=\"refresh\" content=\"0;URL=?message={$message}\">";
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Close database connection
$conn = null;

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

  <!-- Custom styles for this template -->
  <link href="./assets/signin.css" rel="stylesheet">
</head>

<body class="text-center">


  <div align="center">
    <img class="mb-4" src="./assets/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1>Welcome to CSE2102 </h1>
    <h1 class="h3 mb-3 font-weight-normal">To proceed, please login.</h1>
    <form class="form-signin" action="?login=yes" method="post" enctype="multipart/form-data" name="login" target="_self">
      <input name="username" id="username" type="text" class="form-control" placeholder="Username" required autofocus />
      <input name="password" id="password" type="password" class="form-control" placeholder="Password" required />
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
  </div>

  <?php
  if (!empty($userid)) {
            // user is authenticated
            if (isset($_POST['username'])) $_SESSION["username"] = $_POST['username'];
            if (isset($_POST['password'])) $_SESSION["password"] = $_POST['password']; //MD5($_POST['password']);
             
            // $user = $result[0];
            // $_SESSION['logged_in_user_id'] = $user['id'];
            // $_SESSION['name'] = $user['name'];
            // $_SESSION['type'] = $user['type'];

            // bounce to the index file with message
            echo '
            <div class="row">
            <div class="alert alert-success" role="alert">
            You have successfully logged in!
            </div>
            </div>';
            //print "<meta http-equiv=\"refresh\" content=\"0;URL=?message={$message}\">";
        } else {
            // bounce to the index file with a message
            echo '<div class="alert alert-danger" role="alert">
            Please check your username and password and try again!
           </div>';
            
            //print "<meta http-equiv=\"refresh\" content=\"0;URL=?message={$message}\">";
        }
   
  ?>
   
   
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>