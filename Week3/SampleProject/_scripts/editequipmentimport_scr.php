 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	//prepare
	if (isset($_POST['chemical_name'])) $chemical_name = "Yes"; else $chemical_name = "No";
	//if (isset($_POST['colour_code'])) $colour_code = "Yes"; else $colour_code = "No";
	if (isset($_POST['quantity_label'])) $quantity_label = "Yes";  else $quantity_label = "No";
	//if (isset($_POST['blend'])) $blend = "Yes"; else $blend = "No";
	//update record
	updateEquipmentImport($_POST['cid'], $_POST['year'], $_POST['month'], $_POST['equipment'], $_POST['refrigerant'], $_POST['quantity'],$_POST['size'], $_POST['brand'], $_POST['coo'], $_POST['entry_port'], $chemical_name, $quantity_label, $_POST['noau_officer'], $_POST['gra_officer'], $_POST['representative'], $_POST['approved_by'], $_POST['remarks'], $_GET['edit']);
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited equipment import record");
	//bounce back with success message
	$_SESSION['success'] = "The import record has been edited";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?equipment=yes&view={$_GET['edit']}\">";
 ?>