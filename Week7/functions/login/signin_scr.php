<?php 
//sign in script
//open session
	if(!session_id()) {
        session_start();
    }
// include infrastructure 
 	include("../functions.php");

//grab form data
	$email = $_POST['email'];
  	$password = $_POST['password'];

//authenticate user
	$userid = authenticateUser($email, $password);
//if successful: make log, set session and bounce to the application
	if ($userid) {
		$_SESSION['logged_in_user_id'] = $userid;
		$_SESSION['logged_in_user_type'] = getUserType($userid);
		//makeLog();	
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		
		//bounce to appliaction
		$_SESSION['success'] = "You have successfully sign in. Thank you for using our service.";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?\">";
	} else {
//if fail: set message and bounce to signin page
	
	$_SESSION['warning'] = "Invalid login information. Please try again or register to use our service.";
	  print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?\">";
	}

?>