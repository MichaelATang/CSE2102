 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<h1 style="text-align: left;">View Logs </h1>

<hr/>

<?php
//if add do
  //just list all users
 	$results = getAllLogEntries(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">Details</th>    
  </tr>
  </thead>
  
  <tbody>
<?php 
foreach($results as $row){
?>
		<tr>
    <td><?php echo $row['details'];?></td>    
    </tr>
<?php        
  }
?>
</tbody>
</table>

<?php 
  } 
?>