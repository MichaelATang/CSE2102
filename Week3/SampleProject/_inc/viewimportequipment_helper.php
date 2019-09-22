 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer') || ($_SESSION['logged_in_user_type'] == 'GRA')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>Equipment Import Record <span class="GxNoPrint">|<?php if ($_SESSION['logged_in_user_type'] == 'admin') {  ?> <a href="?equipment=yes&edit=<?php echo $result['id']; ?>">Edit</a> |<?php } ?> <a href="?equipment=yes">Return</a></span> </h2>
			<hr class="colorgraph">
            <table width="100%" id="gxtable" class="table table-striped table-bordered">
  <tr>
    <td width="32%">Importer</td>
    <td width="68%"><strong><?php echo getRecoveryAgentName($result['cid']); ?></strong></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><strong><?php echo $result['month'] . ", " . $result['year']; ?></strong></td>
  </tr>
  <tr>
    <td>Equipment</td>
    <td><strong><?php echo $result['equipment']; ?></strong></td>
  </tr>
  <tr>
    <td>Refrigerant</td>
    <td><strong><?php echo $result['refrigerant']; ?></strong></td>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><strong><?php echo $result['quantity']; ?></strong></td>
  </tr>
  <tr>
    <td>Size</td>
    <td><strong><?php echo $result['size']; ?></strong></td>
  </tr>
  <tr>
    <td>Brand</td>
    <td><strong><?php echo $result['brand']; ?></strong></td>
  </tr>
  <tr>
    <td>Country Of Origin</td>
    <td><strong><?php echo $result['coo']; ?></strong></td>
  </tr>
  <tr>
    <td>Entry Port</td>
    <td><strong><?php echo $result['entry_port']; ?></strong></td>
  </tr>
  <tr>
    <td>Labelling Specification</td>
    <td><strong>
    	<ul>
        	<li>Chemical Name: <?php echo $result['chemical_name']; ?></li>
            <!--<li>Colour Code: <?php echo $result['colour_code']; ?></li> -->
            <li>Quantity: <?php echo $result['quantity_label']; ?></li>
            <!--<li>% of blend (if blended): <?php echo $result['blend']; ?></li> -->
        </ul>
	<?php  ?></strong></td>
  </tr>
  <tr>
    <th>Examined By</th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>NOAU Officer</td>
    <td><strong><?php echo $result['noau_officer']; ?></strong></td>
  </tr>
  <tr>
    <td>GRA Officer</td>
    <td><strong><?php echo $result['gra_officer']; ?></strong></td>
  </tr>
  <tr>
    <td>Company Representative </td>
    <td><strong><?php echo $result['representative']; ?></strong></td>
  </tr>
  <tr>
    <td>Approved by</td>
    <td><strong><?php echo $result['approved_by']; ?></strong></td>
  </tr>
  <tr>
    <td>Remarks</td>
    <td><strong><?php echo $result['remarks']; ?></strong></td>
  </tr>
  <tr>
    <td>Record Date/Time</td>
    <td><strong><?php echo $result['dateadded']; ?></strong></td>
  </tr>

</table>

            
 
                     
			<hr class="colorgraph">
			
	
	</div>



<?php 

   } ?>

