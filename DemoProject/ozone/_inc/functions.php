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

//*****************Start Recovery Functions ******************
	function addNewRecoveryAgent($cid, $equipment_type) {
			global $mainDB;
			$result = $mainDB->prepare("INSERT INTO recovery(cid, equipment_type) 
			VALUES(:cid, :equipment_type)");
			$result->execute(array(':cid' => $cid,':equipment_type' => $equipment_type));
			$result = $mainDB->lastInsertId();
			return $result;
	}
	
	function addNewRecoveryEntry($rid, $year, $quarter, $gas_type, $entry_type, $unit){
		global $mainDB;
		$result = $mainDB->prepare("INSERT INTO recovery_entries(rid, year, quarter, gas_type, entry_type, unit) VALUES (:rid, :year, :quarter, :gas_type, :entry_type, :unit)");
		$result->execute(array(':rid' => $rid,':year' => $year, ':quarter' => $quarter, ':gas_type' => $gas_type, ':entry_type' => $entry_type, ':unit' => $unit ));
		
	}
	
	function addNewRecoveryEntryNotes($rid, $year, $quarter, $gas_type, $notes){
		global $mainDB;
		$result = $mainDB->prepare("INSERT INTO recovery_entry_notes(rid, year, quarter, gas_type, notes) VALUES (:rid, :year, :quarter, :gas_type, :notes)");
		$result->execute(array(':rid' => $rid,':year' => $year, ':quarter' => $quarter, ':gas_type' => $gas_type, ':notes' => $notes));
		
	}
	
	
	function duplicateRecoveryEntry($rid, $year, $quarter, $gas_type) {
		global $mainDB;
		$result = $mainDB->prepare("SELECT id FROM recovery_entries WHERE rid=:rid && year=:year && quarter=:quarter && gas_type=:gas_type LIMIT 1");
		$result->execute(array(':rid' => $rid,':year' => $year, ':quarter' => $quarter, ':gas_type' => $gas_type));
		return $result->rowCount();
	}
	
	function duplicateRecoveryEntryNotes($rid, $year, $quarter, $gas_type) {
		global $mainDB;
		$result = $mainDB->prepare("SELECT id FROM recovery_entry_notes WHERE rid=:rid && year=:year && quarter=:quarter && gas_type=:gas_type LIMIT 1");
		$result->execute(array(':rid' => $rid,':year' => $year, ':quarter' => $quarter, ':gas_type' => $gas_type));
		return $result->rowCount();
	}
	
	function recoveryAgentDuplicationCheck($cid) {
		global $mainDB;
		$stmt = $mainDB->query("SELECT cid FROM recovery WHERE cid = '{$cid}' LIMIT 1");
		return $stmt->rowCount();
	}
	
	function getRecoveryAgentById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM recovery WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getSingleRecoveryAgentById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM recovery WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	
	function getAllEntryRecordsForAgent($rid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM recovery_entries WHERE rid=:rid ORDER BY year DESC, quarter DESC, gas_type DESC, entry_type");
		$stmt->execute(array(':rid' => $rid));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getAllNotesForThisGasType($rid, $year, $gas_type) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM recovery_entry_notes WHERE year=:year && rid=:rid && gas_type=:gas_type");
		$stmt->execute(array(':year' => $year, ':rid' => $rid, ':gas_type'=> $gas_type));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getActiveYearsFromRecoveryEntries($rid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT year FROM recovery_entries WHERE rid=:rid GROUP BY year ORDER BY year DESC");
		$stmt->execute(array(':rid' => $rid));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getAllGasTypesPerYearForAgent($rid, $year) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT gas_type FROM recovery_entries WHERE year=:year && rid=:rid GROUP BY gas_type ORDER BY gas_type ASC");
		$stmt->execute(array(':year' => $year, ':rid' => $rid));
		$results = $stmt->fetchAll();
		return $results;
	}
	
	function getActiveQuartersForCurrentYearForAgent($rid, $year) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT quarter FROM recovery_entries WHERE year=:year && rid=:rid GROUP BY quarter ORDER BY quarter ASC");
		$stmt->execute(array(':year' => $year, ':rid' => $rid));
		$results = $stmt->fetchAll();
		return $results;
	}
	
	function getAllEntryTypes() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT entry_type FROM recovery_entries GROUP BY entry_type ORDER BY entry_type ASC");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;		
	}
	
	function getUnitValue($rid, $year, $gas_type, $entry_type, $quarter) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT id, unit FROM recovery_entries WHERE year=:year && rid=:rid && gas_type=:gas_type && quarter=:quarter && entry_type=:entry_type  LIMIT 1");
		$stmt->execute(array(':year' => $year, ':rid' => $rid, ':gas_type'=> $gas_type, ':quarter' => $quarter, ':entry_type' => $entry_type));
		$results = $stmt->fetch();
		return $results;
	}
	
	function getAccumulatedRecoveryTotals($rid, $gas_type, $entry_type) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT SUM(unit) as total FROM recovery_entries WHERE rid=:rid && gas_type=:gas_type && entry_type=:entry_type  LIMIT 1");
		$stmt->execute(array(':rid' => $rid, ':gas_type'=> $gas_type, ':entry_type' => $entry_type));
		$results = $stmt->fetch();
		return $results['total'];
	}
	
	
	function getAllRecoveryAgents() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM recovery");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getRecoveryAgentName($cid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT id, type, fname, lname, organisation FROM contacts WHERE id = :cid LIMIT 1");
		$stmt->execute(array(':cid' => $cid));
		$contact = $stmt->fetch();
		if ($contact['organisation'] == "") 
			$result = $contact['fname'] . " " . $contact['lname']; 
			else $result = $contact['organisation'] . " (". $contact['fname'] . " " . $contact['lname'] . ")";
		return $result;	
	}
	
	function updateRecoveryAgent($id, $equipment_type) {
			global $mainDB;
			$result = $mainDB->prepare("UPDATE recovery SET equipment_type=? WHERE id={$id} LIMIT 1");
			$result->execute(array($equipment_type));	
	}
    
	function deleteUnitEntry($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery_entries WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
	
	function deleteQuarterData($rid, $quarter, $year, $gas_type) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery_entries WHERE rid = :rid && quarter = :quarter && year = :year && gas_type = :gas_type");
		$stmt->execute(array(':rid' => $rid, ':quarter' => $quarter, ':year' => $year, ':gas_type' => $gas_type));
		return 1;
	}
	
	function deleteEntryNote($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery_entry_notes WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;	
	}
	
	function deleteRecoveryAgent($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
	
	function deleteRecoveryAgentEntries($rid) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery_entries WHERE rid = :rid");
		$stmt->execute(array(':rid' => $rid));
		return 1;
	}
	
	function deleteRecoveryAgentEntryNotes($rid) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM recovery_entry_notes WHERE rid = :rid");
		$stmt->execute(array(':rid' => $rid));
		return 1;
	}
	
	function getAllActiveGasTypesForAgent($rid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT gas_type FROM recovery_entries WHERE rid=:rid GROUP BY gas_type ORDER BY gas_type ASC");
		$stmt->execute(array(':rid' => $rid));
		$results = $stmt->fetchAll();
		return $results;
	}
	
	function totalRecoveryAgents() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM recovery");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
	
	function totalRecoveryEntries() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM recovery_entries");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
	
//*****************END Recovery Functions  ***********************

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

//*****************Start substance Import Functions **********
	function addNewSubstanceImport($cid, $substance, $year, $quota_requested, $quota_approved, $quantity_imported, $permit_required, $permit_issue_date, $date_imported, $coo, $entry_port, $chemical_name, $colour_code, $quantity_label, $blend, $noau_officer, $gra_officer, $representative, $approved_by, $remarks) {
		global $mainDB;
			$result = $mainDB->prepare("INSERT INTO substanceimport(cid, substance, year, quota_requested, quota_approved, quantity_imported, permit_required, permit_issue_date, date_imported, coo, entry_port, chemical_name, colour_code, quantity_label, blend, noau_officer, gra_officer, representative, approved_by, remarks) 
			VALUES(:cid, :substance, :year, :quota_requested, :quota_approved, :quantity_imported, :permit_required, :permit_issue_date, :date_imported, :coo, :entry_port, :chemical_name, :colour_code, :quantity_label, :blend, :noau_officer, :gra_officer, :representative, :approved_by, :remarks)");
			$result->execute(array(':cid' => $cid, ':substance' => $substance, ':year' => $year, ':quota_requested' => $quota_requested, ':quota_approved' => $quota_approved, ':quantity_imported' => $quantity_imported, ':permit_required' => $permit_required, ':permit_issue_date' => $permit_issue_date, ':date_imported' => $date_imported, ':coo' => $coo, ':entry_port' => $entry_port, ':chemical_name' => $chemical_name, ':colour_code' => $colour_code, ':quantity_label' => $quantity_label, ':blend' => $blend, ':noau_officer' => $noau_officer, ':gra_officer' => $gra_officer, ':representative' => $representative, ':approved_by' => $approved_by, ':remarks' => $remarks));
			$result = $mainDB->lastInsertId();
			return $result;		
	}
	
	function updateSubstanceImport($cid, $substance, $year, $quota_requested, $quota_approved, $quantity_imported, $permit_required, $permit_issue_date, $date_imported, $coo, $entry_port,  $chemical_name, $colour_code, $quantity_label, $blend, $noau_officer, $gra_officer, $representative, $approved_by, $remarks, $id) {
		global $mainDB;
			$result = $mainDB->prepare("UPDATE substanceimport SET cid=?, substance=?, year=?, quota_requested=?, quota_approved=?, quantity_imported=?, permit_required=?, permit_issue_date=?, date_imported=?, coo=?, entry_port=?, chemical_name=?, colour_code=?, quantity_label=?, blend=?, noau_officer=?, gra_officer=?, representative=?, approved_by=?, remarks=? WHERE id= '{$id}' LIMIT 1");
			$result->execute(array($cid, $substance, $year, $quota_requested, $quota_approved, $quantity_imported, $permit_required, $permit_issue_date, $date_imported, $coo, $entry_port, $chemical_name, $colour_code, $quantity_label, $blend, $noau_officer, $gra_officer, $representative, $approved_by, $remarks));
			return 1;		
	}
	
	function getAllSubstanceImports() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM substanceimport ORDER BY cid");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getSubstanceImportById($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM substanceimport WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	
	function deleteSubstanceImportRecord($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM substanceimport WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
	
	function getSubstanceImportByThisImporter($cid) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM substanceimport WHERE cid=:cid");
		$stmt->execute(array(':cid' => $cid));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getSingleSubstanceImport($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM substanceimport WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	
	function totalSubstanceRecords() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM substanceimport");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
//*****************End Substance Import Functions ************
//*****************Start Publication/Libraray***************
		
	function addNewPublication($author, $journal_title, $title, $reviewers, $abstract, $publisher, $publication_year, $ref, $keywords, $website, $notes) {
			global $mainDB;
			$result = $mainDB->prepare("INSERT INTO publications(author, reviewers, journal_title, title, abstract, publisher, publication_year, ref, keywords, website, notes) 
			VALUES(:author, :reviewers, :journal_title, :title, :abstract, :publisher, :publication_year, :ref, :keywords, :website, :notes)");
			$result->execute(array(':author' => $author, ':reviewers' => $reviewers, ':journal_title' => $journal_title, ':title' => $title, ':abstract' => $abstract, ':publisher' => $publisher, ':publication_year' => $publication_year, ':ref' => $ref, ':keywords' => $keywords,':website' => $website, ':notes' => $notes));
			$result = $mainDB->lastInsertId();
			return $result;
	}
	
	function updatePublication($id, $author, $journal_title, $title, $reviewers, $abstract, $publisher, $publication_year, $ref, $keywords, $website, $notes) {
			global $mainDB;
			$result = $mainDB->prepare("UPDATE publications SET author=?, reviewers=?, journal_title=?, title=?, abstract=?, publisher=?, publication_year=?, ref=?, keywords=?, website=?, notes=?, dateedited=now() WHERE id ={$id} LIMIT 1");
			$result->execute(array($author, $reviewers, $journal_title, $title, $abstract, $publisher, $publication_year, $ref, $keywords, $website, $notes));
	}
	
	function getAllPublications() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM publications ORDER BY title");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getPublicationsBySearch($string) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM publications WHERE title LIKE '%{$string}%' OR keywords LIKE '%{$string}%' OR author LIKE '%{$string}%' OR journal_title LIKE '%{$string}%' OR abstract LIKE '%{$string}%' ORDER BY title");
		$stmt->execute();
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getSinglePublication($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM publications WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetchAll();
		return $results;	
	}
	
	function getPublication($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT * FROM publications WHERE id=:id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		$results = $stmt->fetch();
		return $results;	
	}
	
	function totalPublications() {
		global $mainDB;
		$stmt = $mainDB->prepare("SELECT COUNT(id) AS total FROM publications");
		$stmt->execute();
		$results = $stmt->fetch();
		return $results['total'];	
	}
	
	function deletePublication($id) {
		global $mainDB;
		$stmt = $mainDB->prepare("DELETE FROM publications WHERE id = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		return 1;
	}
//**************END Publication/Library********************
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