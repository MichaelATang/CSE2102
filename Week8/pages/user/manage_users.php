 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<h1 style="text-align: left;">System User Management </h1>

<hr/>

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
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted user {$fname}");		
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
    <th scope="col">eMail/login</th>
    <th scope="col">Type</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  
  <tbody>
<?php 
foreach($results as $row){
	?>
		<tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['lname']; ?></td>
    <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['type'];?></td>
    <td>
      <?php
       if ($_SESSION['logged_in_user_id'] != $row['id'])
        { 
      ?>
          <a class="btn btn-xs btn-danger glyphicon glyphicon-trash" 
             title="Delete User Information" 
             href="?manageusers=yes&del=<?php echo $row['id']; ?>">        
         </a> |
      <?php 
         } 
      ?>  
          <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" 
             title="Edit User Information" 
             href="?manageusers=yes&edit=<?php echo $row['id']; ?>">      
          </a>
  </td>
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