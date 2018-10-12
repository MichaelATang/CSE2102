 <?php 
   if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {

	   ?>
    <div>
			<h2> >  Recovery &amp; Recycle Records for <span class="text-success"><?php echo getRecoveryAgentName($agent['cid']); ?></span> <span class="GxNoPrint">| <a href="?recovery=yes">Close</a></span> </h2>
            <p class="GxNoPrint">Equipment Type: <strong><?php echo $agent['equipment_type']; ?></strong>  <span class="GxNoPrint"> | <a href="#"  data-toggle="collapse" data-target="#newentry">Add New Entry</a> |  <a href="#"  data-toggle="collapse" data-target="#entrynotes">Add Entry Notes</a></span>
            </p>
            
            <div id="entrynotes" class="collapse">
            <form role="form" action="_scripts/addrecoveryentrynotes_scr.php?rid=<?php echo $agent['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="entrynotes">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <th>Year</th>
                    <th>Quarter</th>
                    <th>Gas Type</th>
                    <th>Notes</th>
                    <th>&nbsp;</th>
                  </tr>
                  <tr>
                    <td>
                    <div class="form-group">
                        
                    	<select type="text" name="year" id="year" class="form-control" required  tabindex="1">
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
                    </td>
                    <td>
                    <div class="form-group">
                    
                        <select type="text" name="quarter" id="quarter" class="form-control" required  tabindex="2">
                        	<option value="">Select Quarter</option>
                            <option value="Q1">Q1</option>
                            <option value="Q2">Q2</option>
                            <option value="Q3">Q3</option>
                            <option value="Q4">Q4</option>
                        </select>
					</div>
                    </td>
                    <td>
                    <div class="form-group">
                    
                        <select type="text" name="gas_type" id="gas_type" class="form-control" required  tabindex="3">
                        	<option value="">Select Gas Type</option>
                            <?php 
						$gas_types = getSelectSettings('gas_types');
						foreach ($gas_types as $gas_type) { ?>
							<option value="<?php echo $gas_type; ?>"><?php echo $gas_type; ?></option>
						<?php }
					?>
                        </select>
					</div>
                    </td>
                    <td><div class="form-group">
                        <textarea id="notes" name="notes" class="form-control" placeholder="Notes" required  tabindex="4"></textarea>
					</div></td>
                    <td>
                    
                    <div class="form-group">
                   
                    <input type="submit" value="Add Entry" class="btn btn-primary" tabindex="6">
                    </div>
                    </td>
                  </tr>
                </table>
			</form>
            </div>
            
            <div id="newentry" class="collapse">
            <form role="form" action="_scripts/addrecoveryentry_scr.php?rid=<?php echo $agent['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <th>Year</th>
                    <th>Quarter</th>
                    <th>Gas Type</th>
                    <th>Recovered (lbs)</th>
                    <th>Reused (lbs)</th>
                    <th>Recycled (lbs)</th>
                    <th>Stored (lbs)</th>
                    <th>&nbsp;</th>
                  </tr>
                  <tr>
                    <td>
                    <div class="form-group">
                    	<select type="text" name="year" id="year" class="form-control" required  tabindex="1">
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
                    </td>
                    <td>
                    <div class="form-group">
                        <select type="text" name="quarter" id="quarter" class="form-control" required  tabindex="2">
                        	<option value="">Select Quarter</option>
                            <option value="Q1">Q1</option>
                            <option value="Q2">Q2</option>
                            <option value="Q3">Q3</option>
                            <option value="Q4">Q4</option>
                        </select>
					</div>
                    </td>
                    <td>
                    <div class="form-group">
                    
                        <select type="text" name="gas_type" id="gas_type" class="form-control" required  tabindex="3">
                        	<option value="">Select Gas Type</option>
                            <?php 
						$gas_types = getSelectSettings('gas_types');
						foreach ($gas_types as $gas_type) { ?>
							<option value="<?php echo $gas_type; ?>"><?php echo $gas_type; ?></option>
						<?php }
					?>
                        </select>
					</div>
                    </td>
                    <td>
                   <div class="form-group">
                        <input type="text" name="recovered" id="recovered" class="form-control" placeholder="Unit" required  tabindex="4">
					</div>
                    </td>
                     <td>
                   <div class="form-group">
                        <input type="text" name="reused" id="reused" class="form-control" placeholder="Unit" required  tabindex="5">
					</div>
                    </td>
                    <td>
                    <div class="form-group">
                        <input type="text" name="recycled" id="recycled" class="form-control" placeholder="Unit" required  tabindex="6">
					</div>
                    </td>
                     <td>
                   <div class="form-group">
                        <input type="text" name="stored" id="stored" class="form-control" placeholder="Unit" required  tabindex="7">
					</div>
                    </td>
                    <td>
                    <div class="form-group">
                   
                    <input type="submit" value="Add Entry" class="btn btn-primary" tabindex="8">
                    </div>
                    </td>
                  </tr>
                </table>
			</form>
            </div>
			<hr class="colorgraph">
            <h2>Entry Records</h2>
            <?php 
			// get all active years to build the horixontal tabs
			$years = getActiveYearsFromRecoveryEntries($_GET['view']);
			
			?>
            
  <p class="GxNoPrint">Click to toggle the appropriate year. Click on a quarter to <span class="text-danger">delete</span> the entry.</p>

  <ul class="nav nav-tabs GxNoPrint">
  	<?php 
	$count = 0; //count is used to set first tab (latest year) to active
	foreach($years as $row) { 
		
			?>
			<li <?php if ($count == 0) { ?> class="active" <?php } ?>><a data-toggle="tab" href="#h<?php echo $row['year']; ?>"><?php echo $row['year']; ?></a></li>
			<?php 
			$count++; 
	} ?>
  </ul>

  <div class="tab-content">
  <?php 
	$count = 0;
	foreach($years as $row) { 	//now we are building out the dataset for each year
			?>
            <div id="h<?php echo $row['year']; ?>" class="tab-pane fade <?php if ($count == 0) echo"in active"; ?>">
              <h4><?php echo $row['year']; ?> Records</h4>
			  <!--Content for each active year -->
              
              	<?php
					// get content for year and display appropriately ???dynamically generate a table???
					$gases = getAllGasTypesPerYearForAgent($_GET['view'], $row['year']); 
					foreach ($gases as $gasrow) {
					?>
                    	<table class="table table-bordered table-striped table-condensed">
                        <tr>
                        <?php 
							//get quarters to decide on the amount of columns
							$quarters = getActiveQuartersForCurrentYearForAgent($_GET['view'], $row['year']);
							foreach ($quarters as $quarter) {
								echo "<th>"; ?> 
								<a href="#" title="DELETE ALL RECORDS FOR THIS QUARTER" onClick="linkRef('?recovery=yes&return=<?php echo $_GET['view']; ?>&deletequarter=<?php echo $quarter['quarter']; ?>&year=<?php echo $row['year']; ?>&gas=<?php echo $gasrow['gas_type']; ?>')">
								
								<?php echo $quarter['quarter'] . "(". $gasrow['gas_type'] . ")"."</a></th>";
								echo "<th>Units</th>";
							}
						?>
                        	<th>AT</th>
                        </tr>
                        <?php 
							//get entry types to decide on the amount of rows and populate the data elements
							$entry_types = getAllEntryTypes();
							foreach ($entry_types as $entry_type) {
									$total = 0;
									echo "<tr>";
									foreach ($quarters as $quarter) {
										echo "<td>" . $entry_type['entry_type'] . "</td>";
										$unit = getUnitValue($_GET['view'], $row['year'], $gasrow['gas_type'], $entry_type['entry_type'], $quarter['quarter']);
										$total+=$unit['unit'];
										echo "<td>". $unit['unit'] . "</td>";
									}
									echo "<td>{$total}</td>";
									echo "</tr>";
							}
						?>
                    	</table>	
                    <?php
					//****************************Get all notes for this gast type!!!******************************
						$notes = getAllNotesForThisGasType($_GET['view'], $row['year'], $gasrow['gas_type']);
							echo "<ul>";
						foreach($notes as $note) {
							echo "<li>" . $note['quarter'] . ": " . $note['notes'] . "<span class=\"GxNoPrint\"> [<a href=\"#\" title=\"DELETE RECORD\" onClick=\"linkRef('?recovery=yes&return={$_GET['view']}&deleteentrynote={$note['id']}')\">del</a>]</span></li>"; 	
						}
						echo "</ul><hr/>";
					} // for each gases as gasrow
                    ?>
          
            </div>
            <?php 
			$count++; 
	} ?>
  </div>

            
 
                     
			<hr class="colorgraph">
			
	
	</div>



<?php 

   } ?>