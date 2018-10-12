 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<h1>System User Management <span class="GxNoPrint">| <a href="?manageusers=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New User</a></span></h1>
<?php
//if add do
if (isset($_GET['add'])) {
	//Adding New User
	include('addnewuser_helper.php');
} else if (isset($_GET['edit'])) {
	$user = getUser($_GET['edit']);
	echo "Editing user <b>". $user['fname'] . "<b/>";
	include('edituser_helper.php');
}	else if (isset($_GET['del'])) {
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	$whois = getUserFirstName($_GET['del']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted user {$whois}");
	deleteUser($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The user has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?manageusers=yes\">";
} else {
	//just list all users
	$results = getAllUsers(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Organization</th>
    <th scope="col">eMail/login</th>
    <th scope="col">Type</th>
    <th scope="col">Address</th>
    <th scope="col">Phone</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Organization</th>
    <th scope="col">eMail/login</th>
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
    <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['type'];?></td>
    <td><?php echo $row['street'] . ", " . $row['city'] . ", " . $row['country']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td class="GxNoPrint"><?php if ($_SESSION['logged_in_user_id'] != $row['id']) { ?><a class="btn btn-xs btn-danger glyphicon glyphicon-trash" title="DELETE USER" href="#" onClick="linkRef('?manageusers=yes&del=<?php echo $row['id']; ?>')"></a> | <?php } ?><a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit User Information" href="?manageusers=yes&edit=<?php echo $row['id']; ?>"></a></td>
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