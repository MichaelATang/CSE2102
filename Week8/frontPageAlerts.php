<?php 
	//process and display and messages
	if (isset($_SESSION['success'])) {
		//display warning and reset warning variable
		?>
        <div class="alert alert-success">
  			<strong>Success!</strong> <?php echo $_SESSION['success']; ?>
		</div>
        <?php 
		unset($_SESSION['success']);	
	}
	if (isset($_SESSION['warning'])) {
		//display warning and reset warning variable
		?>
        <div class="alert alert-danger">
  			<strong>Warning!</strong> <?php echo $_SESSION['warning']; ?>
		</div>
        <?php 
		unset($_SESSION['warning']);	
	} 
	
?>