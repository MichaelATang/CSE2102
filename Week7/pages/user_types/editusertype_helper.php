 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="functions/user_types/edit_user_type_scr.php?id=<?php echo $type['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Edit User Type | <a href="?manage_usertypes=yes">Cancel</a> </h2>
			<hr class="colorgraph">
			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="type" id="type" class="form-control input-lg" placeholder="User Type" value="<?php echo $type['type']; ?>" required  tabindex="2">
					</div>
				</div>
			</div>
			
                        
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Update User Type" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
			</div>
		</form>
	</div>
</div>


<?php 

   } ?>

