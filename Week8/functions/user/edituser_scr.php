 <?php		

 //open session
 if(!session_id()) {
	session_start();
 }
 // include infrastructure 
 include("../functions.php");

//grab form data
$id = $_GET['id'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$type = $_POST['type'];
$password = $_POST['password'];

if ($password == "") {
	//edit user without changing password	
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} edited user {$fname}");
	updateUserWithoutPasswordChange($id, $type, $fname, $lname, $email);
	$_SESSION['success'] = "The changes have been saved. Please review.";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manageusers=yes&edit={$id}\">";
} else {
	 //edit user with new password
	$hashed_password = md5($password);
	updateUserWithPasswordChange($id, $type, $fname, $lname, $email, $hashed_password);
	
	//generate email with access information
				$Body = "Hello,\n\n";
				$Body .= "Your user infromation has been edited. Here is your access information:";
				$Body .= "\n\n";
				$Body .= "Login: ";
				$Body .= $email;
				$Body .= "\n";
				$Body .= "Password: ";
				$Body .= $password;
				$Body .= "\n\n";
				$Body .= "\n \nGo over to our website and login to use our service. Do let us hear from you if you have any questions.\n\n";
				
				
				$subject = "New Login Information";
				//Email to user
				$success = mail($email, $subject, $Body, "From: test");
				//bounce back with success message
				$_SESSION['success'] = "The changes with the new password have been saved. Please review.";
				print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manageusers=yes&edit={$id}\">";	
	}

 ?>