 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	//check if exist before add
	if (recoveryAgentDuplicationCheck($_POST['cid'])) {
		//complain of duplication	
		$_SESSION['warning'] = "The recovery agent already exist - DUPLIATION ALERT ERROR 11";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes\">";
	} else {
	
	//add contact
	$id = addNewRecoveryAgent($_POST['cid'], $_POST['equipment_type']);
				//make log
				$who = getUserFirstName($_SESSION['logged_in_user_id']);
				makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added a new recovery agent");
				//bounce back with success message
	$_SESSION['success'] = "The recovery agent has been added!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&show={$id}\">";
	
	}
 ?>