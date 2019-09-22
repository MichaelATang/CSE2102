 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/editcontact_scr.php?id=<?php echo $_GET['edit']; if (isset($_GET['technicians'])) echo "&technicians=yes"; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2><?php echo "Editing";?> Contact | <a href="<?php if (isset($_GET['technicians'])) echo "?technicians=yes"; else echo "?contacts=yes"; ?>">Cancel</a> </h2>
			<hr class="colorgraph">
            
            
           	  <div class="form-group">
              <label>Contact Type</label>
            	      <select name="contact_type" class="form-control input-lg" id="contact_type" required tabindex="1">
                        	<option value ="<?php echo $contact['type']; ?>"><?php echo $contact['type']; ?></option>
                        	<?php 
						$contact_types = getSelectSettings('contact_categories');;
						foreach ($contact_types as $contact_type) { ?>
							<option value="<?php echo $contact_type; ?>"><?php echo $contact_type; ?></option>
						<?php }
					?>
                        </select>         	 
          	  </div>
           
            
		  <div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Title</label>
                        <select name="title" class="form-control input-lg" id="title" required tabindex="2">
                        	<option value ="<?php echo $contact['title']; ?>"><?php echo $contact['title']; ?></option>
                        	<option value ="Mr.">Mr.</option>
                            <option value ="Ms.">Ms.</option>
                            <option value ="Mrs.">Mrs.</option>
                            <option value ="Dr.">Dr.</option>
                        </select>
                    
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>First Name</label>
						<input type="text" name="first_name" id="first_name" class="form-control input-lg" value="<?php echo $contact['fname']; ?>" placeholder="First Name" required  tabindex="3">
					</div>
				</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Last Name</label>
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $contact['lname']; ?>" placeholder="Last Name" required  tabindex="4">
					</div>
				</div>
			</div>
            
            <div class="row">
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Organisation</label>
				<input type="text" name="organisation" id="organisation" class="form-control input-lg" value="<?php echo $contact['organisation']; ?>" placeholder="Organisation" tabindex="5">
					</div>
            	</div>
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Job Title</label>
				<input type="text" name="job_title" id="job_title" class="form-control input-lg" value="<?php echo $contact['job_title']; ?>" placeholder="Job Title" tabindex="6">
					</div>
            	</div>
                
                 <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="form-group">
            <label>Importer (Yes/No)</label>
				<Select type="text" name="importer" id="importer" class="form-control input-lg" required tabindex="7">
                <option value="<?php echo $contact['importer']; ?>"><?php echo $contact['importer']; ?></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                </Select>
				</div>
              </div>
            </div>
            
            <div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Office Phone</label>
                    <input type="text" name="office_phone" id="office_phone" class="form-control input-lg" value="<?php echo $contact['office_phone']; ?>" placeholder="Office Phone" tabindex="8">
                    </div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Home Phone</label>
						<input type="text" name="home_phone" id="home_phone" class="form-control input-lg" value="<?php echo $contact['home_phone']; ?>" placeholder="Home Phone" tabindex="9">
					</div>
				</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Mobile Phone</label>
						<input type="text" name="mobile_phone" id="mobile_phone" class="form-control input-lg" value="<?php echo $contact['mobile_phone']; ?>" placeholder="Mobile Phone" tabindex="10">
					</div>
				</div>
			</div>
            
            <div class="row">
            	<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Fax Number</label>
				<input type="phone" name="fax_number" id="fax_number" class="form-control input-lg" value="<?php echo $contact['fax_number']; ?>" placeholder="Fax Number" tabindex="11">
					</div>
            	</div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>eMail</label>
				<input type="email" name="email" id="email" class="form-control input-lg" value="<?php echo $contact['email']; ?>" placeholder="Email Address" tabindex="12">
					</div>
            	</div>
            </div>
            
            <div class="form-group">
            <label>Street Address</label>
				<input type="text" name="street_address" id="street_address" class="form-control input-lg" value="<?php echo $contact['street']; ?>" placeholder="Street Address" required tabindex="13">
			</div>
            <div class="row">
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Village</label>
						<input type="text" name="village" id="village" class="form-control input-lg" value="<?php echo $contact['village']; ?>" placeholder="Village" required tabindex="14">
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>City/Province</label>
						<input type="text" name="province" id="province" class="form-control input-lg" value="<?php echo $contact['province']; ?>" placeholder="City/Province" required tabindex="15">
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group"> 
                    <label>Region</label>            
                   <select name="region" id="region" class="form-control input-lg" required tabindex="16">
                   <option value="<?php echo $contact['region']; ?>"><?php echo $contact['region']; ?></option>
                   <?php 
				   	$i = 0;
					while($i < 10) {
						$i++;		
						?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php 
					}
					?>
                   </select>  
					</div>
				</div>
			</div>
            <div class="form-group">
                <label>Miscellaneous Notes</label>
				<textarea type="text" name="notes" id="notes" class="form-control input-lg" tabindex="17"><?php echo $contact['notes']; ?></textarea>
			</div>
            
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Only for Technicians</h3>
              </div>
              <div class="panel-body">
              <div class="row">
             <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Retrofitter Licence</label>
                        <Select type="text" name="licence" id="licence" class="form-control input-lg" tabindex="18">
                        	<option value="<?php echo $contact['licence']; ?>"><?php echo $contact['licence']; ?></option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                            </div>
                        </div>
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Certification/Qualification</label>
                        <input type="text" name="certification" id="certification" class="form-control input-lg" value="<?php echo $contact['certification']; ?>" tabindex="19">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                        <label>Certification Date (y-m-d)</label>
                        
                        	<input type="text" name="certification_date" id="certification_date" value="<?php echo $contact['certification_date']; ?>" class="form-control input-lg" tabindex="20">
                 
					</div>
            	</div>
            </div>
                <div class="row">
            	<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Training in Good Practices</label>
                        <textarea type="text" name="good_practices_training" id="good_practices_training" class="form-control input-lg" tabindex="21"><?php echo $contact['good_practices_training']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                        <label>Training on Hydrocarbons</label>
                        <textarea type="text" name="hydrocarbons_training" id="hydrocarbons_training" class="form-control input-lg" tabindex="22"><?php echo $contact['hydrocarbons_training']; ?></textarea>
					</div>
            	</div>
            </div>
            	<div class="form-group">
                    <label>Tools Received</label>
                        <textarea type="text" name="tools_received" id="tools_received" class="form-control input-lg" tabindex="23"><?php echo $contact['tools_received']; ?></textarea>
                            </div>
            
              </div>
            </div>   
                     
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Save Changes" class="btn btn-primary btn-block btn-lg" tabindex="24"></div>
			</div>
		</form>
	</div>



<?php 

   } ?>

