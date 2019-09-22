 <?php 
  if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {

	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/editrecovery_agent_scr.php?id=<?php echo $agent['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Edit <?php echo getRecoveryAgentName($agent['cid']); ?> | <a href="?recovery=yes">Cancel</a> </h2>
			<hr class="colorgraph">
            
           
              <div class="form-group">
            	      <select name="equipment_type" class="form-control input-lg" id="equipment_type" required tabindex="2">
                        	<option value ="<?php echo $agent['equipment_type'];  ?>"><?php echo $agent['equipment_type'];  ?></option>
                        	<option value ="Project Equipment">Project Equipment</option>
                            <option value ="Private Equipment">Private Equipment</option>
                        </select>         	 
          	  </div>
          
			<hr class="colorgraph">
			<div class="row">
				<div align="center"><input type="submit" value="Save Changes" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
			</div>
		</form>
	</div>



<?php 

   } ?>

