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
	
	function genPassword($len = 6)
	{
		$r = '';
		for($i=0; $i<$len; $i++)
			$r .= chr(rand(0, 25) + ord('a'));
		return $r;
	}
	
	function formatMySqlDate($date) {
	return date("Y-m-d", strtotime($date));
	}
	
	
	function make_friendly_date($datetime) {
		return date('d F, Y', strtotime($datetime));	
	}
	
	
	function getRealIpAddr()
		{
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			{
			  $ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			{
			  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
			  $ip=$_SERVER['REMOTE_ADDR'];
			}
			return $ip;
		}		

		//****************START Application Settings******************	
	function getAllSettings() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM settings WHERE id=1 LIMIT 1");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results;	
	}
	
	function updateSettings($url, $email, $phone, $signature, $organisation, $contact_categories, $gas_types, $equipment_types, $approved_by, $officers, $entry_ports) {
			global $mainDB;
			$stmt = $mainDB->prepare("UPDATE settings SET url=?, email=?, phone=?, signature=?, organisation=?, contact_categories=?, gas_types=?, equipment_types=?, approved_by=?, officers=?, entry_ports=?, date=now() WHERE id=1 LIMIT 1");
			$stmt->execute(array($url, $email, $phone, $signature, $organisation, $contact_categories, $gas_types, $equipment_types, $approved_by, $officers, $entry_ports));
	}
	
	//Remove white spaces at the begining of a string
	function trim_value(&$value){ 
    	$value = trim($value); 
	}
	
	function getSelectSettings($field) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT $field FROM settings WHERE id=1 LIMIT 1");
		$stmt->execute();
		$results = $stmt->fetch();
		$results = explode(',',$results[$field]);
		array_walk($results, 'trim_value'); //Remove white spaces at the begining of a string
		return $results;
	}

//************END Application Settings******************	

//*****************Start Log function ***********************
	function makelog($whoid, $usertype, $ip, $details) { // whoid, usertype, ip, what, when
		global $mainDB;
		$result = $mainDB->exec("INSERT INTO logs(whoid, usertype, ip, details) VALUES ('{$whoid}', '{$usertype}', '{$ip}', '{$details}')"); 
	}
	function getAllLogEntries() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM logs");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
//*****************END Log Functions  ***********************		


//*****************Start Contact Functions ******************
	function addNewContact($type, $title, $fname, $lname, $organisation, $job_title, $importer, $office_phone, $home_phone, $mobile_phone, $fax_number, $email, $street, $village, $province, $region, $notes, $licence, $certification, $certification_date, $good_practices_training, $hydrocarbons_training, $tools_received) {
	global $mainDB;
			$result = $mainDB->prepare("INSERT INTO contacts(type, title, fname, lname, organisation, job_title, importer, office_phone, home_phone, mobile_phone, fax_number, email, street, village, province, region, notes, licence, certification, certification_date, good_practices_training, hydrocarbons_training, tools_received ) 
			VALUES(:type, :title, :fname, :lname, :organisation, :job_title, :importer, :office_phone, :home_phone, :mobile_phone, :fax_number, :email, :street, :village, :province, :region, :notes, :licence, :certification, :certification_date, :good_practices_training, :hydrocarbons_training, :tools_received)");
			$result->execute(array(':type' => $type, ':title' => $title, ':fname' => $fname, ':lname' => $lname, ':organisation' => $organisation, ':job_title' => $job_title, ':importer' => $importer, ':office_phone' => $office_phone, ':home_phone' => $home_phone, ':mobile_phone' => $mobile_phone, ':fax_number' => $fax_number,':email' => $email, ':street' => $street, ':village' => $village, ':province' => $province, ':region' => $region, ':notes' => $notes, ':licence' => $licence, ':certification' => $certification, ':certification_date' => $certification_date, ':good_practices_training' => $good_practices_training, ':hydrocarbons_training' => $hydrocarbons_training, ':tools_received' => $tools_received));
			$result = $mainDB->lastInsertId();
			return $result;		
	}
	
	function updateContact($type, $title, $fname, $lname, $organisation, $job_title, $importer, $office_phone, $home_phone, $mobile_phone, $fax_number, $email, $street, $village, $province, $region, $notes, $licence, $certification, $certification_date, $good_practices_training, $hydrocarbons_training, $tools_received, $id) {
	global $mainDB;
			$result = $mainDB->prepare("UPDATE contacts SET type=?, title=?, fname=?, lname=?, organisation=?, job_title=?, importer=?, office_phone=?, home_phone=?, mobile_phone=?, fax_number=?, email=?, street=?, village=?, province=?, region=?, notes=?, licence=?, certification=?, certification_date=? ,good_practices_training=?, hydrocarbons_training=?, tools_received=?, dateedited=now() WHERE id={$id} LIMIT 1");
			$result->execute(array($type, $title, $fname, $lname, $organisation, $job_title, $importer, $office_phone, $home_phone, $mobile_phone, $fax_number, $email, $street, $village, $province, $region, $notes, $licence, $certification, $certification_date, $good_practices_training, $hydrocarbons_training, $tools_received));	
	}
	
	function getImporters() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM contacts WHERE importer='Yes'");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getContactById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM contacts WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetchAll();
		return $results;	
	}
	function getSingleContactById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM contacts WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	function totalContacts() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM contacts");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
	function getAllContacts() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM contacts");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getRecycleContacts() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT id, type, fname, lname, organisation FROM contacts ORDER BY fname, organisation");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getAllTechnicianContacts() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM contacts WHERE type = 'Technician'");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function totalTechnicianContacts() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM contacts WHERE type = 'Technician'");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
	
	function deleteContact($id) {
		global $mainDB;
		//delete from contacts
		$stmt = $mainDB->prepare("DELETE FROM contacts WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		//delete from equipment imports
		$stmt = $mainDB->prepare("DELETE FROM equipmentimport WHERE cid = :cid LIMIT 1");
		$stmt->execute(array(':cid' => $id));
		//delete from substance imports
		$stmt = $mainDB->prepare("DELETE FROM substanceimport WHERE cid = :cid LIMIT 1");
		$stmt->execute(array(':cid' => $id));
		//delete from recovery
		$stmt = $mainDB->prepare("DELETE FROM recovery WHERE cid = :cid LIMIT 1");
		$stmt->execute(array(':cid' => $id));
		return 1;
	}
//*****************End Contact Functions *******************		
//*****************Start Equipment Import Functions **********
	function addNewEquipmentImport($cid, $year, $month, $equipment, $refrigerant, $quantity, $size, $brand, $coo, $entry_port, $chemical_name, $quantity_label, $noau_officer, $gra_officer, $representative, $approved_by, $remarks) {
		global $mainDB;
			$result = $mainDB->prepare("INSERT INTO equipmentimport(cid, year, month, equipment, refrigerant, quantity, size, brand, coo, entry_port, chemical_name, quantity_label, noau_officer, gra_officer, representative, approved_by, remarks) 
			VALUES(:cid, :year, :month, :equipment, :refrigerant, :quantity, :size, :brand, :coo, :entry_port, :chemical_name, :quantity_label, :noau_officer, :gra_officer, :representative, :approved_by, :remarks)");
			$result->execute(array(':cid' => $cid, ':year' => $year, ':month' => $month, ':equipment' => $equipment, ':refrigerant' => $refrigerant, ':quantity' => $quantity, ':size' => $size, ':brand' => $brand, ':coo' => $coo, ':entry_port' => $entry_port, ':chemical_name' => $chemical_name, ':quantity_label' => $quantity_label, ':noau_officer' => $noau_officer, ':gra_officer' => $gra_officer, ':representative' => $representative, ':approved_by' => $approved_by, ':remarks' => $remarks));
			$result = $mainDB->lastInsertId();
			return $result;		
	}
	
	function updateEquipmentImport($cid, $year, $month, $equipment, $refrigerant, $quantity, $size, $brand, $coo, $entry_port, $chemical_name, $quantity_label, $noau_officer, $gra_officer, $representative, $approved_by, $remarks, $id) {
		global $mainDB;
			$result = $mainDB->prepare("UPDATE equipmentimport SET cid=?, year=?, month=?, equipment=?, refrigerant=?, quantity=?, size=?, brand=?, coo=?, entry_port=?, chemical_name=?, quantity_label=?, noau_officer=?, gra_officer=?, representative=?, approved_by=?, remarks=? WHERE id= '{$id}' LIMIT 1");
			$result->execute(array($cid, $year, $month, $equipment, $refrigerant, $quantity, $size, $brand, $coo, $entry_port, $chemical_name, $quantity_label, $noau_officer, $gra_officer, $representative, $approved_by, $remarks));
			return 1;		
	}
	
	function getAllEquipmentImports() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM equipmentimport ORDER BY cid");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getEquipmentImportById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM equipmentimport WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	
	function deleteEquipmentImportRecord($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM equipmentimport WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
	
	function getEquipmentImportByThisImporter($cid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM equipmentimport WHERE cid=:cid");
		$stmt->execute(array(':cid' => $cid));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getSingleEquipmentImport($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM equipmentimport WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	
	function totalEquipmentRecords() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM equipmentimport");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
//*****************End Equipment Import Functions ************

//**************START User Management **********************	
	function addNewUser($type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone, $password){
			global $mainDB;
			$password = md5($password);
			$result = $mainDB->prepare("INSERT INTO users(type, fname, lname, organisation, email, street, city, country, phone, hashed_password) 
			VALUES(:type, :fname, :lname, :organisation, :email, :street, :city, :country, :phone, :hashed_password)");
			$result->execute(array(':type' => $type, ':fname' => $fname, ':lname' => $lname, ':organisation' => $organisation, ':email' => $email, ':street' => $street, ':city' => $city, ':country' => $country, ':phone' => $phone, ':hashed_password' => $password));
			$result = $mainDB->lastInsertId();
			return $result;
	} 
	
	function updateUserWithoutPasswordChange($id, $type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone) {
			global $mainDB;
			$result = $mainDB->prepare("UPDATE users SET type=?, fname=?, lname=?, organisation=?, email=?, street=?, city=?, country=?, phone=? WHERE id ={$id} LIMIT 1");
			$result->execute(array($type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone));
	}
	
	function updateUserWithPasswordChange($id, $type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone, $hashed_password) {
			global $mainDB;
			$result = $mainDB->prepare("UPDATE users SET type=?, fname=?, lname=?, organisation=?, email=?, street=?, city=?, country=?, phone=?, hashed_password=? WHERE id ={$id} LIMIT 1");
			$result->execute(array($type, $fname, $lname, $organisation, $email, $street, $city, $country, $phone, $hashed_password));
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
	
	function getAllUsers() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM users");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getUsersBySearch($string) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM users WHERE fname LIKE '%{$string}%' OR lname LIKE '%{$string}%' OR organisation LIKE '%{$string}%' OR email LIKE '%{$string}%' OR phone LIKE '%{$string}%'");
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
	
	
	function updateUserPassword($email, $password) {
			global $mainDB;
			$hashed_password = md5($password);
			$stmt = $mainDB->prepare("UPDATE users SET hashed_password=? WHERE email=? LIMIT 1");
			$stmt->execute(array($hashed_password, $email));
	}
	
	function deleteUser($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM users WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
	
	function userExists($email) {
		global $mainDB;
		$stmt = $mainDB->query("SELECT email FROM users WHERE email = '{$email}' LIMIT 1");
		return $stmt->rowCount();
	}
	
	function userLoggedIn() {
		return isset($_SESSION['logged_in_user_id']);		
	}
	
	function userLogout() {
		$who = getUserFirstName($_SESSION['logged_in_user_id']);
		makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} logout");
		unset($_SESSION['logged_in_user_id']);
		unset($_SESSION['logged_in_user_type']);
		return 0;
	}
//****************END User Management ************************	
	


	function storeTheExport($content){
		global $mainDB;
		$result = $mainDB->prepare("UPDATE export_content SET content = ? WHERE id = 1");
		$result->execute(array($content));
		
	}
	
	
	function getTheExportContent() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT content FROM export_content WHERE id=1 LIMIT 1");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['content'];
	}
	
	
?>