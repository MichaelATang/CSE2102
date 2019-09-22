 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	$settings = getAllSettings();
	//grab form data
	$id = $_GET['id'];
	$fname = $_POST['first_name'];
  	$lname = $_POST['last_name'];
	if (isset($_POST['organisation'])) $organisation = $_POST['organisation']; else $organisation = '';
  	$email = $_POST['email'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$phone = $_POST['phone'];
	$type = $_POST['type'];
	$password = $_POST['password'];
	
	if ($password == "") {
		//edit user without changing password	
		updateUserWithoutPasswordChange($id, $type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone);
		//make log
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited user {$fname}");
		$_SESSION['success'] = "The changes have been saved. Please review.";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=../?manageusers=yes&edit={$id}\">";
	} else {
	 	//edit user with new password
		$hashed_password = md5($password);
		updateUserWithPasswordChange($id, $type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone, $hashed_password);
		
	//generate email with access information
				$Body = "Dear {$fname},\n\n";
				$Body .= "Your user infromation has been edited at {$settings['url']}. Here is your access information:";
				$Body .= "\n\n";
				$Body .= "Login: ";
				$Body .= $email;
				$Body .= "\n";
				$Body .= "Password: ";
				$Body .= $password;
				$Body .= "\n\n";
				$Body .= "\n \nGo over to our website at {$settings['url']} and login to use our service. Do let us hear from you if you have any questions.\n\n";
				$Body .= $settings['signature'];
				
				$subject = "New Login Information - {$settings['url']}";
				//Email to user
				$success = mail($email, $subject, $Body, "From: <{$settings['email']}>");
				//make log
				$who = getUserFirstName($_SESSION['logged_in_user_id']);
				makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited and change password for user {$fname}");
				//bounce back with success message
				$_SESSION['success'] = "The changes with the new password have been saved. Please review.";
				print "<meta http-equiv=\"refresh\" content=\"0;URL=../?manageusers=yes&edit={$id}\">";	
	}

 ?>