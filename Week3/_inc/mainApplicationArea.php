<?php 
//Main Application Area
//echo "you are logged in";
?>
<div class="GxNoPrint">
<div class="pull-right"> 
   Welcome <?php echo getUserFirstName($_SESSION['logged_in_user_id']); ?>! | 
   <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
       <a href="?manageusers=yes" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-user"></span> Manage Users</a> 
       <a href="?logs=show" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-pencil"></span> Audit Logs</a>
       <?php 
   }
   ?>
    <a href="?logout=1" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </div>
 <div class="btn-group btn-group-justified">
 <?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?>
  <a href="?contacts=yes" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Contacts</a> 
  <?php } ?> 
   <?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer') || ($_SESSION['logged_in_user_type'] == 'GRA')) { ?>
 <a href="?equipment=yes" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span> Equipment Imports</a>
   <?php } ?>  
</div> 
</div> <!--No Print -->

<?php 
	//General Contacts
	if (isset($_GET['contacts'])){
		include("_inc/general_contacts.php");
	} else
	//Equipment Imports
	if (isset($_GET['equipment'])){
		include("_inc/equipmentimports_main.php");
	} else	
	//User Management
	if (isset($_GET['manageusers'])){
		include("_inc/manage_users.php");
	} else
	//logs
	if (isset($_GET['logs'])){
		include("_inc/logs.php");
	} else	
	//recovery
	if (isset($_GET['recovery'])){
		include("_inc/recovery_main.php");
	} else
	//log out section
	if (isset($_GET['logout'])) {
		userLogout();
		//redirect to frontage
		$_SESSION['success'] = "Thank you for using our service. See you again soon!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=?\">";
	} else {
	//dashboard area content
	include("_inc/application_dashboard.php"); 	
	}
?>
