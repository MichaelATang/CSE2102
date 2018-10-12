 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<h1>System Audit Log</h1>
<?php

	//just list all entries
	$results = getAllLogEntries(); 
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
    <th scope="col">Who</th>
    <th scope="col">Type</th>
    <th scope="col">IP</th>
    <th scope="col">Details</th>
    <th scope="col">When</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">Who</th>
    <th scope="col">Type</th>
    <th scope="col">IP</th>
    <th scope="col">Details</th>
    <th scope="col">When</th>
  </tr>
  </tfoot>
  <tbody>
<?php 
foreach($results as $row){
	?>
		<tr>
            <td><?php echo getUserFirstName($row['whoid']); ?></td>
            <td><?php echo $row['usertype']; ?></td>
            <td><?php echo $row['ip']; ?></td>
            <td><?php echo $row['details']; ?></td>
            <td><?php echo $row['when'];?></td>
  		</tr>
<?php        
}
?>
</tbody>
</table>

<?php 
// just listing all users if not add nor edit

   } // if logged in as admin
?>