<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
  Welcome <?php echo getUserFirstName($_SESSION['logged_in_user_id']); ?>! 
  </a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">

	  <a href="?logout=1" class="nav-link">
		  <span class="glyphicon glyphicon-log-out"></span>Sign out</a>

    </li>
  </ul>
</nav>

<!-- Side Bar -->
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
			  <?php 
					if ($_SESSION['logged_in_user_type'] == 'admin') {
						?>
							<a href="?manageusers=yes"><span class="glyphicon glyphicon-user"></span> Manage Users</a> 
						<?php 
					}
			  ?> 
            </a>
		  </li>
		  <li class="nav-item">
		  <?php 
					if ($_SESSION['logged_in_user_type'] == 'admin') {
						?>
              <span data-feather="file"></span>
			  <a href="?manageusers=yes&add=yes">Add New User</a>
			  <?php 
					}
		  ?> 
		  </li>
		  <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
			  <?php 
					if ($_SESSION['logged_in_user_type'] == 'admin') {
						?>
							<a href="?manageusertypes=yes"><span class="glyphicon glyphicon-user"></span> Manage User Types</a> 
						<?php 
					}
			  ?> 
            </a>
		  </li>
		  <li class="nav-item">
		  <?php 
					if ($_SESSION['logged_in_user_type'] == 'admin') {
						?>
              <span data-feather="file"></span>
			  <a href="?manageusertypes=yes&add=yes">Add New User Type</a>
			  <?php 
					}
		  ?> 
		  </li>
		</ul>
	  </div>
	</nav>  


	<!-- Main content area  -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<?php
		if (isset($_GET['manageusers'])){
			include("pages/user/manage_users.php");
		}
		if (isset($_GET['manageusertypes'])){
			include("pages/user_types/manage_usertypes.php");
		}	
	 ?>		
    </main>	
	</div>
</div>
	 


 

</div> 
</div> <!--No Print -->

<?php     
//log out section
	if (isset($_GET['logout'])) {
		userLogout();
		//redirect to frontage
		$_SESSION['success'] = "Thank you for using our service. See you again soon!";
		print "<meta http-equiv=\"refresh\" content=\"0;URL=?\">";
	} else {
	
	}
?>
