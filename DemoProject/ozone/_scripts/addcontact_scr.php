 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	
	
	//add contact
	$contactid = addNewContact($_POST['contact_type'], $_POST['title'], $_POST['first_name'], $_POST['last_name'], $_POST['organisation'], $_POST['job_title'], $_POST['importer'],$_POST['office_phone'], $_POST['home_phone'], $_POST['mobile_phone'], $_POST['fax_number'], $_POST['email'], $_POST['street_address'], $_POST['village'], $_POST['province'], $_POST['region'], $_POST['notes'], $_POST['licence'], $_POST['certification'], $_POST['certification_date'], $_POST['good_practices_training'], $_POST['hydrocarbons_training'], $_POST['tools_received']);
				//make log
				$who = getUserFirstName($_SESSION['logged_in_user_id']);
				makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added a new contact {$_POST['first_name']}");
				//bounce back with success message
	$_SESSION['success'] = "The contact has been added!";
	if ((isset($_GET['technicians'])) || ($_POST['contact_type'] == "Technician")) 
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?technicians=yes&view={$contactid}\">";
	else 
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?contacts=yes&view={$contactid}\">";
 ?>