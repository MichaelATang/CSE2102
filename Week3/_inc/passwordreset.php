<?php 
	//echo "Resetting Password";
?>

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="_scripts/passwordreset_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="signin">
			<fieldset>
				<h2>Password Reset</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" required  placeholder="Submit Your Email Address">
				</div>
				
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Reset Password">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="?" class="btn btn-lg btn-primary btn-block">Cancel</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>


     