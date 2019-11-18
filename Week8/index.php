<?php
//open session
if (!session_id()) {
    session_start();
}
include("functions/functions.php");
// $settings = getAllSettings();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Bootstrap</title>


    <!-- Custom styles for this template -->
    <link href="./assets/signin.css" rel="stylesheet">
    <link href="./assets/dashboard.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="container-fluid">
        <?php
        //debug
        //if (isset($_SESSION['logged_in_user_id'])) echo $_SESSION['logged_in_user_id'];

        //application alerts
        include("frontPageAlerts.php");
        ?>

        <?php
        /// check if user is logged in else show signin and signup page
        if (userLoggedIn())
            // show application
            include("mainApplicationArea.php");
        //else just show the signin page!
        else {
            include("pages/login/signin.php");
            // include ("_inc/downloads.php");
        }
        ?>
    </div> <!-- Container end -->

    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <hr />

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>