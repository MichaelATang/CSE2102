 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer') || ($_SESSION['logged_in_user_type'] == 'GRA')) {
	  ?>
<h1>Equipment Imports <span class="GxNoPrint">| <?php if (isset($_GET['show'])) { ?><a href="?equipment=yes">Show All</a> | <?php } ?> <a href="?equipment=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New Record</a></span> | <a href="?equipment=yes&export=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Export List to Excel</a></span></h1>
<?php
if (isset($_GET['export'])) {
	include('exports/equipment_exports.php'); }
//if add do
else if (isset($_GET['add'])) {
	//Adding New User
	include('addnewequipmentimport_helper.php');
} else if (isset($_GET['edit'])) {
	$edit = getSingleEquipmentImport($_GET['edit']); 
	include('editequipmentimport_helper.php');
}	else if (isset($_GET['del'])) {
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted an equipment import record");
	deleteEquipmentImportRecord($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The record has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?equipment=yes\">";
} else if (isset($_GET['view'])) {
		$result = getSingleEquipmentImport($_GET['view']);
		include('viewimportequipment_helper.php');
} else {
	 if (isset($_GET['show'])) $results = getEquipmentImportById($_GET['show']); 
									else  $results = getAllEquipmentImports(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
   <th scope="col">Importer</th>
    <th scope="col">Year</th>
    <th scope="col">Month</th>
    <th scope="col">Equipment</th>
    <th scope="col">Refrigerant</th>
    <th scope="col">Qty</th>
    <th scope="col">Size</th>
    <th scope="col">Brand</th>
    <th scope="col" title="Country Of Origin">COO</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">Importer</th>
    <th scope="col">Year</th>
    <th scope="col">Month</th>
    <th scope="col">Equipment</th>
    <th scope="col">Refrigerant</th>
    <th scope="col">Qty</th>
    <th scope="col">Size</th>
    <th scope="col">Brand</th>
    <th scope="col">COO</th>
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
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['month']; ?></td>
    <td><?php echo $row['equipment']; ?></td>
    <td><?php echo $row['refrigerant']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['size']; ?></td>
    <td><?php echo $row['brand']; ?></td>
    <td><?php echo $row['coo']; ?></td>
    <td class="GxNoPrint"><?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?><a class="btn btn-xs btn-danger glyphicon glyphicon-trash" href="#" title="DELETE RECORD" onClick="linkRef('?equipment=yes&del=<?php echo $row['id']; ?>')"></a>  <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit Record" href="?equipment=yes&edit=<?php echo $row['id']; ?>"></a> <?php } ?>  <a class="btn btn-xs btn-success glyphicon glyphicon-zoom-in" title="View record" href="?equipment=yes&view=<?php echo $row['id']; ?>"></a></td>
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