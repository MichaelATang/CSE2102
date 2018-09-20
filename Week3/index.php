<?php 
//open session
	if(!session_id()) {
        session_start();
    }
	include("_inc/functions.php");
	$settings = getAllSettings();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title><?php echo $settings['organisation']; ?></title>
    
   <script type="text/javascript">
		function linkRef(yurl ){
		var linkref = yurl;
			if(confirm("Do you really want to DELETE this item?")){
				window.location.href=linkref;
			}
		}
	</script>
      
  </head>
  <body>
   <div id="header">
  	 My Lab Register
  </div>
  
 
  <?php
  	//application alerts
	include("/_inc/frontPageAlerts.php");
  ?>
	
	<?php 
	/// check if user is logged in else show signin and signup page
	if (userLoggedIn()) 
		// show application
		include("_inc/mainApplicationArea.php");
	 else 	
		// get user to signup or signin	
		if (isset($_GET['resetpassword'])) 
			include("_inc/passwordreset.php");
					//else just show the signin page!
		 	 		else {
							include("_inc/signin.php"); 
							
					}
	?>
    
  
  </body>
</html>
<script>
	
</script>