<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="scripts/addnewdata_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding New Data </h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" required  tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" required  tabindex="2">
					</div>
				</div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required  tabindex="2">
					</div>
				</div>
			</div>
			
            <div class="form-group">
                <select id="type" type="text" name="type" class="form-control input-lg" placeholder="User Type" required tabindex="9">
                <option value="">User Type</option>
                <option value="admin">admin</option>
                <option value="officer">officer</option>
                <option value="GRA">GRA</option>
                <option value="PTCCB">PTCCB</option>
                </select>
			</div>
            
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register User" class="btn btn-primary btn-block btn-lg" tabindex="10"></div>
			</div>
		</form>
	</div>
</div>

