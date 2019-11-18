 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../functions.php");
	
	
	//grab form data
	$fname = $_POST['first_name'];
  	$lname = $_POST['last_name'];
	if (isset($_POST['organisation'])) $organisation = $_POST['organisation']; else $organisation = '';
  	$email = $_POST['email'];
	$type = $_POST['type'];
	$password = genPassword(7);
	
	//check to see if user already exist and deal with it
	if (userExists($email)) {
		// bounce to signup and complain
		$_SESSION['warning'] = "User with the email address {$email} already exists!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?signup=1\">";
	} else {
	//add user
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added user {$fname}");	
	$userid = addNewUser($type, $fname, $lname, $email, $password);
	//generate email with access information
				$Body = "Dear {$fname},\n\n";
				$Body .= "You have been added as a user. Here is your access information:";
				$Body .= "\n\n";
				$Body .= "Login: ";
				$Body .= $email;
				$Body .= "\n";
				$Body .= "Password: ";
				$Body .= $password;
				$Body .= "\n\n";
				$Body .= "\n \nGo over to our website  and login to use our service. Do let us hear from you if you have any questions.\n\n";
				
				$subject = "Login Information";
				//Email to user
				//$success = mail($email, $subject, $Body, "From: <{$settings['email']}>");
				//make log
				$who = getUserFirstName($_SESSION['logged_in_user_id']);
				//makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} added a new user {$fname}");
				//bounce back with success message
	$_SESSION['success'] = "The user has been added! An email was sent to {$email} with full login information! password:{$password}";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manageusers=yes\">";
	}
 ?>