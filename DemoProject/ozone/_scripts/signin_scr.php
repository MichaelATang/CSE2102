<?php 
//sign in script
//open session
	if(!session_id()) {
        session_start();
    }
// include infrastructure 
 	include("../_inc/functions.php");

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
		$ip = getRealIpAddr();
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		makelog($userid, $_SESSION['logged_in_user_type'], $ip, "{$who} Sign in");
		
		//bounce to appliaction
		$_SESSION['success'] = "You have successfully sign in. Thank you for using our service.";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?\">";
	} else {
//if fail: set message and bounce to signin page
    //make log
	$ip = getRealIpAddr();
	makelog('0', "user", $ip, "Invalid Signin: u={$email}, p={$password}");
		
	$_SESSION['warning'] = "Invalid login information. Please try again or register to use our service.";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?\">";
	}

?>