 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../functions.php");
	
	
	//grab form data
	$type = $_POST['type'];
	
	//check to see if user already exist and deal with it
	if (typeExists($type)) {
		// bounce to signup and complain
		$_SESSION['warning'] = "Type: {$type} already exists!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?signup=1\">";
	} else {
	//add type
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added user type {$type}");	
	
	$type_id = addNewUserType($type);
	$_SESSION['success'] = "The Type: {$type} has been added!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manage_usertypes=yes\">";
	}
 ?>