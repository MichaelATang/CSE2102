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

	function getAllUsers() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM users");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}

	function getUser($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM users WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	
	function genPassword($len = 6){
		$r = '';
		for($i=0; $i<$len; $i++)
			$r .= chr(rand(0, 25) + ord('a'));
		return $r;
	}

	function userExists($email) {
		global $mainDB;
		$stmt = $mainDB->query("SELECT email FROM users WHERE email = '{$email}' LIMIT 1");
		return $stmt->rowCount();
	}

	function addNewUser($type, $fname, $lname,  $email,  $password){
		global $mainDB;
		$password = md5($password);
		$result = $mainDB->prepare("INSERT INTO users(type, fname, lname, email, hashed_password) 
		VALUES(:type, :fname, :lname, :email, :hashed_password)");
		$result->execute(array(':type' => $type, ':fname' => $fname, ':lname' => $lname, ':email' => $email, ':hashed_password' => $password));
		$result = $mainDB->lastInsertId();
		return $result;
	}	
	
?>