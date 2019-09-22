 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	$rid = $_GET['rid'];
	$year = $_POST['year'];
	$quarter = $_POST['quarter'];
	$gas_type = $_POST['gas_type'];
	$recovered = $_POST['recovered'];
	$reused = $_POST['reused'];
	$recycled = $_POST['recycled'];
	$stored = $_POST['stored'];
	//check for duplicate entry
	if (duplicateRecoveryEntry($_GET['rid'], $_POST['year'], $_POST['quarter'], $_POST['gas_type'])) {
		//bounce out
		$_SESSION['warning'] = "Duplicate Entry: Error 22";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&view={$_GET['rid']}\">";
	} else {
	
		//add entry
		addNewRecoveryEntry($rid, $year, $quarter, $gas_type, "Recovered", $recovered);
		addNewRecoveryEntry($rid, $year, $quarter, $gas_type, "Reused", $reused);
		addNewRecoveryEntry($rid, $year, $quarter, $gas_type, "Recycled", $recycled);
		addNewRecoveryEntry($rid, $year, $quarter, $gas_type, "Stored", $stored);
		//make log
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added a new recover and recycle entry");
		//bounce out
		$_SESSION['success'] = "The new entry has been added!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?recovery=yes&view={$_GET['rid']}\">";
	}
 ?>