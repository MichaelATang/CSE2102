 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	//prepare
	if (isset($_POST['chemical_name'])) $chemical_name = "Yes"; else $chemical_name = "No";
	if (isset($_POST['colour_code'])) $colour_code = "Yes"; else $colour_code = "No";
	if (isset($_POST['quantity_label'])) $quantity_label = "Yes";  else $quantity_label = "No";
	if (isset($_POST['blend'])) $blend = "Yes"; else $blend = "No";
	//add contact
	updateSubstanceImport($_POST['cid'], $_POST['substance'], $_POST['year'], $_POST['quota_requested'], $_POST['quota_approved'], $_POST['quantity_imported'], $_POST['permit_required'], $_POST['permit_issue_date'], $_POST['date_imported'], $_POST['coo'], $_POST['entry_port'], $chemical_name, $colour_code, $quantity_label, $blend, $_POST['noau_officer'], $_POST['gra_officer'], $_POST['representative'], $_POST['approved_by'], $_POST['remarks'], $_GET['id']);
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited a substance import record {$_GET['id']}");
	//bounce back with success message
	$_SESSION['success'] = "The import record has been edited. Please review.";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?substance=yes&view={$_GET['id']}\">";
 ?>