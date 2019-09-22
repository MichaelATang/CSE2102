 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	
	//check for duplicate entry
	if (duplicateRecoveryEntryNotes($_GET['rid'], $_POST['year'], $_POST['quarter'], $_POST['gas_type'], $_POST['notes'])) {
		//bounce out
		$_SESSION['warning'] = "Duplicate Entry: Error 22";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&view={$_GET['rid']}\">";
	} else {
	
		//add Recovery entry Notes
		addNewRecoveryEntryNotes($_GET['rid'], $_POST['year'], $_POST['quarter'], $_POST['gas_type'], $_POST['notes']);
		
		//make log
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added a new entry note");
		//bounce out
		$_SESSION['success'] = "The new entry note has been added!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&view={$_GET['rid']}\">";
	}
 ?>