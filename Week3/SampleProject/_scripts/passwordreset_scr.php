<?php
//password reset script

 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	$settings = getAllSettings();
	//grab email
	$email = $_POST['email'];
	
	//check to see if user exist
		if (userExists($email)) {
		//if yes - reset password
			$new_password = genPassword(8);
			updateUserPassword($email,$new_password);
			
			//make log
			$ip = getRealIpAddr();
			$user = getBasicUserInfo($email); 
			makelog($user['id'], "user", $ip, "Changed password");

			//email user
				$Body = "Dear {$fname},\n\n";
				$Body .= "You have reset your access information for";
				$Body .= $settings['organisation'];
				$Body .= "Here is your new access information:";
				$Body .= "\n\n";
				$Body .= "Login: ";
				$Body .= $email;
				$Body .= "\n";
				$Body .= "Password: ";
				$Body .= $new_password;
				$Body .= "\n\n";
				$Body .= "\n \nGo over to our website at";
				$Body .= $settings['url']; 
				$Body .= " and login to use our service. Do let us hear from you if you have any questions.\n\n";
				$Body .= $settings['signature'];
				
				$subject = "Login Information - ";
				$subject .= $setting['organisation'];
				//Email to user
				$success = mail($email, $subject, $Body, "From: <{$settings['email']}>");
				
			
			//bounce to login
			$_SESSION['success'] = "You have successfully updated your password! Check your email at {$email} for your new password.";
			print "<meta http-equiv=\"refresh\" content=\"0;URL=../?success=1\">";
			
		} else {
		//if no bounce and complain
			$_SESSION['warning'] = "Invalid email address '{$email}'. Please confirm your information or register to use our service.";
			print "<meta http-equiv=\"refresh\" content=\"0;URL=../?resetpassword=1\">";
		}
?>