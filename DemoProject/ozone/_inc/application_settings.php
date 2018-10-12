<?php if (isset($_GET['edit'])) {
	//edit the settings
	updateSettings($_POST['url'], $_POST['email'], $_POST['phone'], $_POST['signature'], $_POST['organisation'], $_POST['contact_categories'], $_POST['gas_types'], $_POST['equipment_types'], $_POST['approved_by'], $_POST['officers'], $_POST['entry_ports'] );
	//make log entry
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "settings updated");
	// bounce back to display new settings
	$_SESSION['success'] = "Settings have been saved.";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?settings=show\">";	
} else {
	//render saved settings 
	?>

<h1>Application Settings</h1>
<?php 
	$settings = getAllSettings();
	//render form with settings
?>
<div class="row">
    <!--<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"> -->
		<form role="form" action="?settings=show&edit=yes"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Current Settings | <a href="?">Return</a> </h2>
            <p>Last Edited <?php echo $settings['date']; ?></p>
			<hr class="colorgraph">
			
			<div class="form-group">
            	<label>Name of Organisation</label>
				<input type="text" name="organisation" id="organisation" class="form-control input-lg" value="<?php echo $settings['organisation']; ?>" placeholder="Organisation" tabindex="1">
			</div>
            	<div class="form-group">
            	<label>Application URL</label>
				<input type="url" name="url" id="url" class="form-control input-lg" value="<?php echo $settings['url']; ?>" placeholder="url" tabindex="2">
			</div>
			<div class="form-group">
                <label>Support Email</label>
				<input type="email" name="email" id="email" class="form-control input-lg" value="<?php echo $settings['email']; ?>" placeholder="Email Address" required tabindex="3">
			</div>
            <div class="form-group">
            	<label>Support Phone</label>
				<input type="text" name="phone" id="phone" class="form-control input-lg" value="<?php echo $settings['phone']; ?>" placeholder="Support Phone"  required tabindex="4">
			</div>
               <div class="form-group">
            	<label>Email Signature</label>
				<textarea type="text" name="signature" id="signature" class="form-control input-lg" required tabindex="5"><?php echo $settings['signature']; ?></textarea>
			</div>
            <div class="form-group">
            	<label>Contact Categories (Default = "Technician", comma separated values) </label>
				<textarea type="text" name="contact_categories" id="contact_categories" class="form-control input-lg" required tabindex="6"><?php echo $settings['contact_categories']; ?></textarea>
			</div>
            
			<div class="form-group">
            	<label>Gas Types/Substances (comma separated values)</label>
				<textarea type="text" name="gas_types" id="gas_types" class="form-control input-lg" required tabindex="6"><?php echo $settings['gas_types']; ?></textarea>
			</div>
      		
            <div class="form-group">
            	<label>Equipment Types (comma separated values)</label>
				<textarea type="text" name="equipment_types" id="equipments_types" class="form-control input-lg" required tabindex="6"><?php echo $settings['equipment_types']; ?></textarea>
			</div>
            
             <div class="form-group">
            	<label>Entry Ports (comma separated values)</label>
				<textarea type="text" name="entry_ports" id="entry_ports" class="form-control input-lg" required tabindex="6"><?php echo $settings['entry_ports']; ?></textarea>
			</div>
            
            <div class="form-group">
            	<label>Approved By (comma separated values)</label>
				<textarea type="text" name="approved_by" id="approved_by" class="form-control input-lg" required tabindex="6"><?php echo $settings['approved_by']; ?></textarea>
			</div>
            
            <div class="form-group">
            	<label>NOAU Officers (comma separated values)</label>
				<textarea type="text" name="officers" id="officers" class="form-control input-lg" required tabindex="6"><?php echo $settings['officers']; ?></textarea>
			</div>
            
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Save Settings" class="btn btn-primary btn-block btn-lg" tabindex="10"></div>
			</div>
		</form>
<!--	</div> -->
</div>

<?php } // if rendering saves settings  ?>