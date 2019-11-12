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
	$type_id = addNewUserType($type);
	$_SESSION['success'] = "The Type: {$type} has been added!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manage_usertypes=yes\">";
	}
 ?>