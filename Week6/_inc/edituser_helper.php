 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/edituser_scr.php?id=<?php echo $user['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Edit User | <a href="?manageusers=yes">Cancel</a> </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" value="<?php echo $user['fname']; ?>" required  tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" value="<?php echo $user['lname']; ?>" required  tabindex="2">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php echo $user['email']; ?>" required tabindex="4">
			</div>
                
            
            <div class="form-group">
                <select id="type" type="text" name="type" class="form-control input-lg" placeholder="User Type" required tabindex="9">
                <option value="<?php echo $user['type']; ?>"><?php echo $user['type']; ?></option>
                <option value="admin">admin</option>
                <option value="officer">officer</option>
                <option value="GRA">GRA</option>
                <option value="PTCCB">PTCCB</option>
                </select>
			</div>
            <label>Leave blank to keep current password</label>
            <div class="form-group">
				<input type="text" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="10">
			</div>
            
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Update User" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
			</div>
		</form>
	</div>
</div>


<?php 

   } ?>

