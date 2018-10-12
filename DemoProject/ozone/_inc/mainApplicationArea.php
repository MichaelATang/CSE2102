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
       <a href="?settings=show" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-cog"></span> Settings</a> 
       <a href="?logs=show" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-pencil"></span> Audit Logs</a>
       <?php 
   }
   ?>
   <a href="#" onclick="GxPrint()" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-print"></span> Print</a>
   <a href="?help=show" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-question-sign"></span> Help</a>  
  <a href="?logout=1" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </div>
 <div class="btn-group btn-group-justified">
 <?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?>
  <a href="?contacts=yes" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Contacts</a> 
  <?php } ?> 
   <?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer') || ($_SESSION['logged_in_user_type'] == 'GRA')) { ?>
 <a href="?equipment=yes" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span> Equipment Imports</a>
   <?php } ?> 
 <a href="?substance=yes" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span> Substance Imports</a>
  <?php if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) { ?>
 <a href="?library=yes" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> Library</a>
 <a href="?technicians=yes" class="btn btn-primary"><span class="glyphicon glyphicon-wrench"></span> Technicians</a>
 <a href="?recovery=yes" class="btn btn-primary"><span class="glyphicon glyphicon-grain"></span> Recovery & Recycling</a>
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
	//Refrigerant Imports
	if (isset($_GET['substance'])){
		include("_inc/substanceimports_main.php");
	} else
	//User Management
	if (isset($_GET['manageusers'])){
		include("_inc/manage_users.php");
	} else
	//logs
	if (isset($_GET['logs'])){
		include("_inc/logs.php");
	} else
	//Settings
	if (isset($_GET['settings'])){
		include("_inc/application_settings.php");
	} else
	
	//Library Controls
	if (isset($_GET['library'])){
		include("_inc/module/library.php");
	} else
	//technicians
	if (isset($_GET['technicians'])){
		include("_inc/technicians.php");
	} else
	
	//recovery
	if (isset($_GET['recovery'])){
		include("_inc/recovery_main.php");
	} else
//help section
	if (isset($_GET['help'])) {
		include("_inc/helpsection.php");	
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
