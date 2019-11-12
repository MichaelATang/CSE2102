 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<h1 style="text-align: left;">System User Types Management </h1>

<hr/>

<?php
//if add do
if (isset($_GET['add'])) {
	//Adding New User
	include('addnewusertype_helper.php');
} else if (isset($_GET['edit'])) {
	$type = getUserTypes($_GET['edit']);
	echo "Editing user type: <b>". $type['type'] . "<b/>";
	include('editusertype_helper.php');
}	else if (isset($_GET['del'])) {
	// $who = getUserFirstName($_SESSION['logged_in_user_id']);
	// $whois = getUserFirstName($_GET['del']);
	// makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted user {$whois}");
	deleteUserType($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The user type has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?manageuserstypes=yes\">";
} else {
  //just list all users
 	$results = getAllUserTypes(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">Type</th>
    <th scope="col">Actions</th>
  </tr>
  </thead>
  
  <tbody>
<?php 
foreach($results as $row){
	?>
		<tr>
    <td><?php echo $row['type'];?></td>
    <td>
      <?php
       
      ?>
          <a class="btn btn-xs btn-danger glyphicon glyphicon-trash" 
             title="Delete User Type" 
             href="?manageusertypes=yes&del=<?php echo $row['id']; ?>">        
         </a> |
      <?php 
         
      ?>  
          <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" 
             title="Edit User Type" 
             href="?manageusertypes=yes&edit=<?php echo $row['id']; ?>">      
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