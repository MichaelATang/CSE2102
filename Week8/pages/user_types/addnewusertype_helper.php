 <?php 
   if ($_SESSION['logged_in_user_type'] == 'admin') {
	   ?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="functions/user_types/add_user_type.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding New User Type | <a href="?manageusertypes=yes">Cancel</a> </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="type" id="type" class="form-control input-lg" placeholder="Type" required  tabindex="1">
					</div>
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="10"></div>
			</div>
		</form>
	</div>
</div>


<?php 

   } ?>

