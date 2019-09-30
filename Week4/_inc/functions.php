<?php //functions

	require_once("db_connect.php");
	
	//single_query	  	
	function query($query) {
		$success = mysql_query($query);
			if (!$success) {
				die("Database query failed: " . mysql_error());
			}
		return $success;
	}
	//return results query
	function query2($query) {
		$success = mysql_query($query);
			if (!$success) {
				die("Database query failed: " . mysql_error());
			}
		$success = mysql_fetch_array($success);
		return $success;
	}
	
	
	function authenticateUser($email, $password) {
			global $mainDB;
			$hashed_password = md5($password);
			$stmt = $mainDB->prepare("SELECT id FROM users WHERE email = :email AND hashed_password = :hashed_password LIMIT 1");
			$stmt->execute(array(':email' => $email, ':hashed_password' => $hashed_password));
			$id = $stmt->fetch();
			return $id['id'];
	}
	
	function getBasicUserInfo($email) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT id, fname, lname FROM users WHERE email = :email LIMIT 1");
		$stmt->execute(array(':email' => $email));
		$user = $stmt->fetch();
		return $user;	
	}
	
		function getUserType($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT type FROM users WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$userType = $stmt->fetch();
		return $userType['type'];	
	}
	
	function getUserFirstName($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT fname FROM users WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$userFirstName = $stmt->fetch();
		return $userFirstName['fname'];	
	}
	
	
	function userLoggedIn() {
		return isset($_SESSION['logged_in_user_id']);		
	}
	
	function userLogout() {
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		unset($_SESSION['logged_in_user_id']);
		unset($_SESSION['logged_in_user_type']);
		return 0;
	}
	
	
?>