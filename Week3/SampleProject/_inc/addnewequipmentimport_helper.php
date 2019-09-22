 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/addequipmentimport_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding New Import Record | <a href="?equipment=yes">Cancel</a> </h2>
			<hr class="colorgraph">
            
              
           	  <div class="form-group">
              <label>Importer</label>
            	      <select name="cid" class="form-control input-lg" id="cid" required tabindex="1">
                        	<option value ="">Select Importer</option>
                        	<?php 
								$results = getImporters(); 
								foreach($results as $contact){
									if ($contact['organisation'] == "")
										echo "<option value=". $contact['id'].">". $contact['fname'] . " " . $contact['lname']. "</option>";
											else echo "<option value=". $contact['id'] .">". $contact['organisation']. " (" . $contact['fname'] . " " . $contact['lname']. ")</option>";
								}
							?>
                        </select>       	 
          	  </div>
          
            
		  <div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Year</label>
                        <select type="text" name="year" id="year" class="form-control input-lg" required  tabindex="2">
                        	<?php 
								$year = date("Y");
								$i = 20;
								while ($i > 0){
									?>
                                    	<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php 
									$year--; 
									$i--; 	
								}
							?> 
                        </select>  
                    
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
						 <label>Month</label>
                        <select type="text" name="month" id="month" class="form-control input-lg" required  tabindex="3">
                        	<option value="<?php echo date("M"); ?>"><?php echo date("M"); ?></option>
                        	<?php 
								for ($m=1; $m<=12; $m++) {
								 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
								 ?>
								 <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
								 <?php 
								 }
							?> 
                        </select>
					</div>
				</div> <!--row -->
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Equipment</label>
						<select type="text" name="equipment" id="equipment" class="form-control input-lg" required  tabindex="4">
                        <option value="">Select One</option>
                          <?php 
						$equipment_types = getSelectSettings('equipment_types');;
						foreach ($equipment_types as $equipment_type) { ?>
							<option value="<?php echo $equipment_type; ?>"><?php echo $equipment_type; ?></option>
						<?php }
					?>
                        </select>
					</div>
				</div>
			</div> <!--row -->
            
            <div class="row">
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Refrigerant</label>
				<select type="text" name="refrigerant" id="refrigerant" class="form-control input-lg" tabindex="5">
                	<option value="">Select One</option>
                    <?php 
						$gas_types = getSelectSettings('gas_types');
						foreach ($gas_types as $gas_type) { ?>
							<option value="<?php echo $gas_type; ?>"><?php echo $gas_type; ?></option>
						<?php }
					?>
                </select>
					</div>
            	</div> <!--row -->
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Quantity</label>
				<input type="text" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantity" tabindex="6">
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Size</label>
				<input type="text" name="size" id="size" class="form-control input-lg" placeholder="Size" required tabindex="7">
					</div>
            	</div>
            </div> <!--row -->
            
                        
            <div class="row">
            	<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                  <label>Equipment Brand</label>  
				<input type="text" name="brand" id="brand" class="form-control input-lg" placeholder="Brand" required tabindex="8">
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>County Of Origin (COO)</label>
				<input type="text" name="coo" id="coo" class="form-control input-lg" placeholder="County Of Origin" required tabindex="9">
					</div>
            	</div>
                
                <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="form-group">
                    <label>Entry Port</label>
				<select type="text" name="entry_port" id="entry_port" class="form-control input-lg" tabindex="10">
                	<option value="">Select One</option>
                    <?php 
						$entry_ports = getSelectSettings('entry_ports');
						foreach ($entry_ports as $entry_port) { ?>
							<option value="<?php echo $entry_port; ?>"><?php echo $entry_port; ?></option>
						<?php }
					?>
                </select>
					</div>
            	</div>
              
            </div> <!--row -->
           <div class="row">
          
           <div class="col-xs-12 col-sm-4 col-md-4">
           <h4 class="text-success">Lebelling Specifications</h4>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="chemical_name" name="chemical_name" value="yes" tabindex="11"> Chemical Name
              </label>
            </div>
            &nbsp;           
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="quantity_label" name="quantity_label" value="yes" tabindex="13"> Quantity
              </label>
            </div>           
            </div>
            
             <div class="col-xs-12 col-sm-8 col-md-8">
           <h4 class="text-success">Examined By</h4>
           
           				<div class="form-group">
                    		
							<label>NOAU Officer</label>
                            <select type="text" name="noau_officer" id="noau_officer" class="form-control input-lg" tabindex="15">
                                <option value="">Select NOAU Officer</option>
                                <?php 
                                    $officers = getSelectSettings('officers');
                                    foreach ($officers as $officer) { ?>
                                        <option value="<?php echo $officer; ?>"><?php echo $officer; ?></option>
                                    <?php }
                                ?>
                            </select>
						</div>
           
           
           
           				<div class="form-group">
                    		<label>GRA Officer</label>
							<input type="text" name="gra_officer" id="gra_officer" class="form-control input-lg" placeholder="GRA Officer" required tabindex="16">
						</div>
           
           
           				<div class="form-group">
                    		<label>Company Representative</label>
							<input type="text" name="representative" id="representative" class="form-control input-lg" placeholder="Company Representative" required tabindex="17">
						</div>
           </div>
             </div> <!--row -->     
             <hr/>
             <div class="form-group">
              <h4 class="text-success">Approved By</h4>
            	      <select name="approved_by" class="form-control input-lg" id="approved_by" required tabindex="18">
                      <option value="">Select One</option>
                      <?php 
                                    $approvers = getSelectSettings('approved_by');
                                    foreach ($approvers as $approve) { ?>
                                        <option value="<?php echo $approve; ?>"><?php echo $approve; ?></option>
                                    <?php }
                                ?>
                      </select>       	 
          	  </div>
             <div class="form-group">
              <label>NOAU Remarks/Recommendations</label>
            	      <textarea name="remarks" class="form-control input-lg" id="remarks" tabindex="18"></textarea>       	 
          	  </div>
               
			<hr class="colorgraph">
			<div class="row">
				<div><input type="submit" value="Add Record" class="btn btn-primary btn-block btn-lg" tabindex="19"></div>
			</div>
		</form>
	</div>



<?php 

   } ?>

