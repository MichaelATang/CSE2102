 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>View Contact <span class="GxNoPrint">| <?php 
			if ($_SESSION['logged_in_user_type'] == 'admin') { ?>
			<a href="<?php if (isset($_GET['technicians'])) echo "?technicians=yes&edit={$_GET['view']}"; else echo "?contacts=yes&edit={$_GET['view']}"; ?>">Edit</a> | <?php } ?><a href="<?php if (isset($_GET['technicians'])) echo "?technicians=yes"; else echo "?contacts=yes"; ?>">Close</a></span> </h2>
			<hr class="colorgraph">
            <table width="100%" id="gxtable" class="table table-striped table-bordered">
  <tr>
    <td width="32%">Contact Type</td>
    <td width="68%"><strong><?php echo $contact['type']; ?></strong></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><strong><?php echo $contact['title'] . " " . $contact['fname'] . " " . $contact['lname']; ?></strong></td>
  </tr>
  <tr>
    <td>Organisation/Business</td>
    <td><strong><?php echo $contact['organisation']; ?></strong></td>
  </tr>
  <tr>
    <td>Job Title</td>
    <td><strong><?php echo $contact['job_title']; ?></strong></td>
  </tr>
  <tr>
    <td>Importer</td>
    <td><strong><?php echo $contact['importer']; ?></strong></td>
  </tr>
  <tr>
    <td>Office Phone</td>
    <td><strong><?php echo $contact['office_phone']; ?></strong></td>
  </tr>
  <tr>
    <td>Home Phone</td>
    <td><strong><?php echo $contact['home_phone']; ?></strong></td>
  </tr>
  <tr>
    <td>Mobile Phone</td>
    <td><strong><?php echo $contact['mobile_phone']; ?></strong></td>
  </tr>
  <tr>
    <td>Fax Number</td>
    <td><strong><?php echo $contact['fax_number']; ?></strong></td>
  </tr>
  <tr>
    <td>eMail</td>
    <td><strong><?php echo $contact['email']; ?></strong></td>
  </tr>
  <tr>
    <td>Street Address</td>
    <td><strong><?php echo $contact['street']; ?></strong></td>
  </tr>
  <tr>
    <td>Village</td>
    <td><strong><?php echo $contact['village']; ?></strong></td>
  </tr>
  <tr>
    <td>City/Province</td>
    <td><strong><?php echo $contact['province']; ?></strong></td>
  </tr>
  <tr>
    <td>Region</td>
    <td><strong><?php echo $contact['region']; ?></strong></td>
  </tr>
  <tr>
    <td>Notes</td>
    <td><strong><?php echo $contact['notes']; ?></strong></td>
  </tr>
  <?php if ($contact['type'] == "Technician") { ?>
  <tr>
    <td>Licence</td>
    <td><strong><?php echo $contact['licence']; ?></strong></td>
  </tr>
  <tr>
    <td>Certification/Qualification</td>
    <td><strong><?php echo $contact['certification']; ?></strong></td>
  </tr>
  <tr>
    <td height="23">Certification Date</td>
    <td><strong><?php echo $contact['certification_date']; ?></strong></td>
  </tr>
  <tr>
    <td>Training in Good Practices</td>
    <td><strong><?php echo $contact['good_practices_training']; ?></strong></td>
  </tr>
  <tr>
    <td>Training on Hydrocarbons</td>
    <td><strong><?php echo $contact['hydrocarbons_training']; ?></strong></td>
  </tr>
  <tr>
    <td height="23">Tools Recevied</td>
    <td><strong><?php echo $contact['tools_received']; ?></strong></td>
  </tr>
  <?php } ?>
</table>

            
 
                     
			<hr class="colorgraph">
			
	
	</div>



<?php 

   } ?>

