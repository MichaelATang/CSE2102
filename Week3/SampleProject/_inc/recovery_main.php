 <?php 
  if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {

	  ?>
<h1>Recovery &amp; Recycling <span class="GxNoPrint">| <a href="?recovery=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New Organisation/Technician</a></span></h1>
<?php
if (isset($_GET['deletequarter'])) {
	//delete the quater data (rid, quarter, year, gas_type)
	deleteQuarterData($_GET['return'], $_GET['deletequarter'], $_GET['year'], $_GET['gas']);
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted an quarter entry from recovery_entries");
	//bounce to where you belong
	$_SESSION['success'] = "The quarter data has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?recovery=yes&view={$_GET['return']}\">";
} else if (isset($_GET['deleteentry'])) { //deprecated in latest version 
	//delete the entry
	deleteUnitEntry($_GET['deleteentry']);
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted an entry from recovery_entries");
	//bounce to where you belong
	$_SESSION['success'] = "The entry has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?recovery=yes&view={$_GET['return']}\">";
} else if (isset($_GET['deleteentrynote'])) {
	//delete the entry
	deleteEntryNote($_GET['deleteentrynote']);
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted an entry note");
	//bounce to where you belong
	$_SESSION['success'] = "The entry note has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?recovery=yes&view={$_GET['return']}\">";
	
//if add do
} else if (isset($_GET['add'])) {
	//Adding New User
	include('addnewrecovery_helper.php');
} else if (isset($_GET['edit'])) {
	$agent = getSingleRecoveryAgentById($_GET['edit']);
	include('editrecovery_helper.php');
} else if (isset($_GET['view'])) {
	$agent = getSingleRecoveryAgentById($_GET['view']);
	include('viewrecovery_helper.php');
}	else if (isset($_GET['del'])) {
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted a recovery agent");
	deleteRecoveryAgent($_GET['del']);
	deleteRecoveryAgentEntries($_GET['del']);
	deleteRecoveryAgentEntryNotes($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The recovery has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?recovery=yes\">";
} else {
	//just list all users
	if (isset($_GET['show'])) {
		$results = getRecoveryAgentById($_GET['show']);
	} else $results = getAllRecoveryAgents(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
   <th scope="col">Technician/Company</th>
    <th scope="col">Equipment Type</th>
    <th scope="col">Recovered Totals (lbs)</th>
    <th scope="col">Reused Totals (lbs)</th>
    <th scope="col">Stored Totals (lbs)</th>
    <th scope="col">Recycled Totals (lbs)</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">Technician/Company</th>
    <th scope="col">Equipment Type</th>
    <th scope="col">Recovered Totals</th>
    <th scope="col">Reused Totals</th>
    <th scope="col">Stored Totals</th>
    <th scope="col">Recycled Totals</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </tfoot>
  <tbody>
<?php 
foreach($results as $row){
	?>
		<tr>
    <td><a href="?contacts=yes&show=<?php echo $row['cid']; ?>" title="<?php $agent_name = getRecoveryAgentName($row['cid']); echo $agent_name;  ?>"><?php 
	// get the name of the agent from contacts
	echo $agent_name; 
	?></a>
	</td>
    <td><?php echo $row['equipment_type']; ?></td>
    <td><?php 
	//get GAS types
	$gas_types = getAllActiveGasTypesForAgent($row['id']);
							foreach ($gas_types as $gas_type) {
								$total = getAccumulatedRecoveryTotals($row['id'], $gas_type['gas_type'], 'Recovered');
								echo $gas_type['gas_type'] . " [<span class=\"text-success\">{$total}</span>]<br />";
							}
	
	?></td>
    <td><?php 
	//get GAS types
	$gas_types = getAllActiveGasTypesForAgent($row['id']);
							foreach ($gas_types as $gas_type) {
								$total = getAccumulatedRecoveryTotals($row['id'], $gas_type['gas_type'], 'Reused');
								echo $gas_type['gas_type'] . " [<span class=\"text-success\">{$total}</span>]<br />";
							}
	
	?></td>
      <td><?php 
	//get GAS types
	$gas_types = getAllActiveGasTypesForAgent($row['id']);
							foreach ($gas_types as $gas_type) {
								$total = getAccumulatedRecoveryTotals($row['id'], $gas_type['gas_type'], 'Stored');
								echo $gas_type['gas_type'] . " [<span class=\"text-success\">{$total}</span>]<br />";
							}
	
	?></td>
    <td><?php 
	//get GAS types
	$gas_types = getAllActiveGasTypesForAgent($row['id']);
							foreach ($gas_types as $gas_type) {
								$total = getAccumulatedRecoveryTotals($row['id'], $gas_type['gas_type'], 'Recycled');
								echo $gas_type['gas_type'] . " [<span class=\"text-success\">{$total}</span>]<br />";
							}
	
	?></td>
    <td class="GxNoPrint"><?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?><a class="btn btn-xs btn-danger glyphicon glyphicon-trash" href="#" title="DELETE RECORDS" onClick="linkRef('?recovery=yes&del=<?php echo $row['id']; ?>')"></a>  <?php } ?><a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit Recovery Agent" href="?recovery=yes&edit=<?php echo $row['id']; ?>"></a>  <a class="btn btn-xs btn-success glyphicon glyphicon-zoom-in" title="View Recovery Agent Records" href="?recovery=yes&view=<?php echo $row['id']; ?>"></a></td>
  </tr>
<?php        
}
?>
</tbody>
</table>

<?php 
// just listing all users if not add nor edit
}
   } // if logged in as admin
?>