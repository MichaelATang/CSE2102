 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {

	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/addrecovery_agent_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding Organisation/Technician | <a href="?recovery=yes">Cancel</a> </h2>
			<hr class="colorgraph">
            
            
           	  <div class="form-group">
            	      <select name="cid" class="form-control input-lg" id="cid" required tabindex="1">
                        	<option value ="">Select Organisation/Technician</option>
                        	<?php 
								//get all organisation/technician
								//if personal or technician list first name and last name else list organisation
								$results = getRecycleContacts(); // the function RecycleContact get only the required fields needed
								foreach($results as $contact){
									if ($contact['organisation'] == "")
										echo "<option value=". $contact['id'].">". $contact['fname'] . " " . $contact['lname']. "</option>";
											else echo "<option value=". $contact['id'] .">". $contact['organisation']. " (" . $contact['fname'] . " " . $contact['lname']. ")</option>";
								}
							?>
                        </select>         	 
          	  </div>
              <div class="form-group">
            	      <select name="equipment_type" class="form-control input-lg" id="equipment_type" required tabindex="2">
                        	<option value ="">Select Equipment</option>
                        	<option value ="Project Equipment">Project Equipment</option>
                            <option value ="Private Equipment">Private Equipment</option>
                        </select>         	 
          	  </div>
            
		  
                     
			<hr class="colorgraph">
			<div class="row">
				<div align="center"><input type="submit" value="Add Recovery & Recycling Agent" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
			</div>
		</form>
	</div>



<?php 

   } ?>

