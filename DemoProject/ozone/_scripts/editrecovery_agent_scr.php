 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	
	
	//add contact
	updateRecoveryAgent($_GET['id'], $_POST['equipment_type']);
				//make log
				$who = getUserFirstName($_SESSION['logged_in_user_id']);
				makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited a recovery agent");
				//bounce back with success message
	$_SESSION['success'] = "The recovery agent been edited!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&show={$_GET['id']}\">";
 ?>