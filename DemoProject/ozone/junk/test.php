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
  
  <div class="container" >  
                <h3 class="text-center">Export HTML table to Excel File using Jquery with PHP</h3><br />  
                <div class="table-responsive" id="employee_table">  
                        <?php $results = getAllContacts(); ?>
<table class="table table-bordered">
   <tr>
   <th scope="col">Title</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Organisation</th>
    <th scope="col">Job Title</th>
    <th scope="col">Street</th>
    <th scope="col">Village</th>
    <th scope="col">Province</th>
    <th scope="col">Region</th>
    <th scope="col">eMail</th>
    <th scope="col">Office Phone</th>
    <th scope="col">Home Phone</th>
    <th scope="col">Mobile Phone</th>
    <th scope="col">Contact Type</th>
  </tr>
 <?php 
foreach($results as $row){
	?>
		<tr>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['lname']; ?></td>
    <td><?php echo $row['organisation']; ?></td>
    <td><?php echo $row['job_title']; ?></td>
    <td><?php echo $row['street']; ?></td>
    <td><?php echo $row['village']; ?></td>
    <td><?php echo $row['province']; ?></td>
    <td><?php echo $row['region']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['office_phone']; ?></td>
    <td><?php echo $row['home_phone']; ?></td>
    <td><?php echo $row['mobile_phone']; ?></td>
    <td><?php echo $row['type']; ?></td>
  </tr>
<?php        
}
?>
</table>

                </div>  
                <div align="center">  
                     <button name="create_excel" id="create_excel" class="btn btn-success">Create Excel File</button>  
                </div>  
           </div>  
           <br />  
   
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

<script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script> 