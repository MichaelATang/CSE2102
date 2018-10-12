 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer') || ($_SESSION['logged_in_user_type'] == 'PTCCB') || ($_SESSION['logged_in_user_type'] == 'GRA')) {
	  ?>
<h1>Substance Imports <span class="GxNoPrint">| 
    <?php if (isset($_GET['show'])) { ?><a href="?substance=yes">Show All</a> | <?php } ?> <a href="?substance=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New Record</a></span> | <a href="?substance=yes&export=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Export List to Excel</a></span></h1>
<?php
if (isset($_GET['export'])) {
	include('exports/substance_exports.php'); }
//if add do
else if (isset($_GET['add'])) {
	//Adding New User
	include('addnewsubstanceimport_helper.php');
} else if (isset($_GET['edit'])) {
	$edit = getSingleSubstanceImport($_GET['edit']); 
	include('editsubstanceimport_helper.php');
}	else if (isset($_GET['del'])) {
	//make log
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted a substance import record {$_GET['del']}");
	deleteSubstanceImportRecord($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The record has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?substance=yes\">";
} else if (isset($_GET['view'])) {
		$result = getSingleSubstanceImport($_GET['view']);
		include('viewimportsubstance_helper.php');
} else {
	 if (isset($_GET['show'])) $results = getSubstanceImportById($_GET['show']); 
									else  $results = getAllSubstanceImports(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
   <th scope="col">Importer</th>
    <th scope="col">Substance</th>
    <th scope="col">Year</th>
    <th scope="col" title="Quota Requested">Requested (kg)</th>
    <th scope="col" title="Quota Approved">Approved (kg)</th>
    <th scope="col" title="Quantity Imported">Imported (kg)</th>
    <th scope="col">Permit Issued</th>
    <th scope="col">Date Examined</th>
    <th scope="col" title="Remarks">Remarks</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">Importer</th>
    <th scope="col">Substance</th>
    <th scope="col">Year</th>
    <th scope="col" title="Quota Requested">Requested</th>
    <th scope="col" title="Quota Approved">Approved</th>
    <th scope="col" title="Quantity Imported">Imported</th>
    <th scope="col">Permit Issued</th>
    <th scope="col">Import Date</th>
    <th scope="col" title="Remarks">Remarks</th>
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
    <td><?php echo $row['substance']; ?></td>
    <td><?php echo $row['year']; ?></td>
    <td><?php echo $row['quota_requested']; ?></td>
    <td><?php echo $row['quota_approved']; ?></td>
    <td><?php echo $row['quantity_imported']; ?></td>
    <td><?php echo $row['permit_issue_date']; ?></td>
    <td><?php echo $row['date_imported']; ?></td>
    <td><?php echo $row['remarks']; ?></td>
    <td class="GxNoPrint"><?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?><a class="btn btn-xs btn-danger glyphicon glyphicon-trash" href="#" title="DELETE RECORD" onClick="linkRef('?substance=yes&del=<?php echo $row['id']; ?>')"></a>  <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit Record" href="?substance=yes&edit=<?php echo $row['id']; ?>"></a> <?php } ?>  <a class="btn btn-xs btn-success glyphicon glyphicon-zoom-in" title="View record" href="?substance=yes&view=<?php echo $row['id']; ?>"></a></td>
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