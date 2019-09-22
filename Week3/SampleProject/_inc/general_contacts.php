 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	  ?>
<h1>General Contacts <span class="GxNoPrint">| <a href="?contacts=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New</a>
| <a href="?contacts=yes&export=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Mailing List</a></span></h1>
<?php
//if export
if (isset($_GET['export'])) {
	include('exports/contact_exports.php'); 
//if add do
} else if (isset($_GET['add'])) {
	//Adding New User
	include('addnewcontact_helper.php');
} else if (isset($_GET['edit'])) {
	$contact = getSingleContactById($_GET['edit']);
	//echo "Editing contact <b>". $contact['title'] . " " . $contact['fname'] . " " . $contact['lname'] . "<b/>";
	include('editcontact_helper.php');
} else if (isset($_GET['view'])) {
	$contact = getSingleContactById($_GET['view']);
	//echo "View contact <b>". $contact['title'] . " " . $contact['fname'] . " " . $contact['lname'] . "<b/>";
	include('viewcontact_helper.php');
}	else if (isset($_GET['del'])) {
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted contact");
	deleteContact($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The contact has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?contacts=yes\">";
} else {
	//just list all users
	if (isset($_GET['show'])) {
		$results = getContactById($_GET['show']);
	} else $results = getAllContacts(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Organisation</th>
    <th scope="col">eMail</th>
    <th scope="col">Type</th>
    <th scope="col">Address</th>
    <th scope="col">Phone</th>
    <th scope="col" width="80px" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Organisation</th>
    <th scope="col">eMail</th>
    <th scope="col">Type</th>
    <th scope="col">Address</th>
    <th scope="col">Phone</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </tfoot>
  <tbody>
<?php 
foreach($results as $row){
	?>
		<tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['lname']; ?></td>
    <td><?php echo $row['organisation']; ?></td>
    <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
      <td><?php echo $row['type'];
	  if (($row['type'] == "Technician") && ($row['licence'] == "Yes"))
	  			echo "<br />(<span class=\"text-danger\">Licensed</span>)";
	  ?></td>
    <td><?php echo $row['street'] . ", " . $row['village'] . ",<br /> " . $row['province'] . ", Region " . $row['region']; ?></td>
    <td>(w) <?php echo $row['office_phone']; ?><br />
    	(h) <?php echo $row['home_phone']; ?><br />
        (m) <?php echo $row['mobile_phone']; ?><br /></td>
    <td class="GxNoPrint"><?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?> <a class="btn btn-xs btn-danger glyphicon glyphicon-trash" href="#" title="DELETE RECORD" onClick="linkRef('?contacts=yes&del=<?php echo $row['id']; ?>')"></a>  <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit Contact" href="?contacts=yes&edit=<?php echo $row['id']; ?>"></a> <?php } ?> <a class="btn btn-xs btn-success glyphicon glyphicon-zoom-in" title="View Contact" href="?contacts=yes&view=<?php echo $row['id']; ?>"></a></td>
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