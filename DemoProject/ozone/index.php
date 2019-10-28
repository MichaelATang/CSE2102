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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $settings['organisation']; ?></title>

    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
   <script src="js/sigin.js"></script> 
   <script src="js/bootstrap-formhelpers.min.js"></script>
   <script type="text/javascript">
		function linkRef(yurl ){
		var linkref = yurl;
		if(confirm("Do you really want to DELETE this item?")){
			window.location.href=linkref;
		}
		}
	</script>
    
   <script type="text/javascript">
   $(document).ready(function() {
    $('#gxtable').DataTable();
	} );
	</script>

    
    <!-- Form Helpers -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-formhelpers.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div id="header">
  	<div class="mainlogo"><a class="GxNoPrint" href="?"><img src="images/logo.png" <?php if (userLoggedIn()) { ?> width="450" <?php } ?> class="img-responsive" alt="National OZONE Action Unit"></a></div>
  </div>
  
  <div class="container">
  <?php
  	//debug
	//if (isset($_SESSION['logged_in_user_id'])) echo $_SESSION['logged_in_user_id'];
 	
	//application alerts
	include("_inc/frontPageAlerts.php");
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
							include ("_inc/downloads.php");
					}
	?>
	</div> <!-- Container end -->
   
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp;
   &nbsp; 
   &nbsp;
   <hr/>
  </body>
</html>
<script>
	function GxPrint() {
		window.print();
	}
</script>