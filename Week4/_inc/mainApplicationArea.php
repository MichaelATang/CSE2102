
   Welcome <?php echo getUserFirstName($_SESSION['logged_in_user_id']); ?>! | 
  <a href="?logout=1" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
