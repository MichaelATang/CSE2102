 <?php
 


   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="functions/user/signup_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding New User | <a href="?manageusers=yes">Cancel</a> </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" required  tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" required  tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" required tabindex="4">
			</div>
			
			
			<div class="form-group">
                <select id="type" type="text" name="type" class="form-control input-lg" placeholder="User Type" required tabindex="9">
                			
				<?php
					// include infrastructure 
					include("functions/db_connect.php");
					$results = getAllUserTypes();

					foreach($results as $row){
				?>
					<option value=<?php echo $row['type']; ?> > 
					    <?php echo $row['type']; ?>
				    </option>
					
				<?php   
					}	
				?>
				
			  </select>
			</div>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register User" class="btn btn-primary btn-block btn-lg" tabindex="10"></div>
			</div>
		</form>
	</div>
</div>


<?php 

   } ?>

