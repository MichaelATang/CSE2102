 <?php 
   if (isset($_SESSION['logged_in_user_type'])) {
	   ?>
    <div>
		<form role="form" action="_scripts/addnewpublication_scr.php"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Adding New Publication | <a href="?library=yes">Cancel</a> </h2>
			<hr class="colorgraph">
            <div class="form-group">
				<input type="text" name="title" id="title" class="form-control input-lg" placeholder="Publication Title" required tabindex="1">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="author" id="author" class="form-control input-lg" placeholder="Author(s)" required  tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="journal_title" id="journal_title" class="form-control input-lg" placeholder="Journal Title" tabindex="3">
					</div>
				</div>
			</div>
            <div class="form-group">
				<input type="text" name="reviewers" id="reviewers" class="form-control input-lg" placeholder="Reviewer(s)" tabindex="4">
			</div>
			
            <div class="form-group">
				<input type="text" name="publisher" id="publisher" class="form-control input-lg" placeholder="Publisher" tabindex="5">
			</div>
            
			<div class="form-group">
				<textarea type="textarea" name="abstract" id="abstract" class="form-control input-lg" placeholder="Abstract" tabindex="6"></textarea>
			</div>
            
                  
			 <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
                <label>Publication Year</label>
					<div class="form-group">
						<input type="text" name="publication_year" id="publication_year" class="form-control input-lg" placeholder="YYYY" tabindex="7">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                <label>Reference #</label>
					<div class="form-group">
                        <input type="text" name="ref" id="ref" class="form-control input-lg" placeholder="Reference #" tabindex="8">
					</div>
				</div>
			</div>	
            <div class="form-group">
				<input type="text" name="website" id="website" class="form-control input-lg" placeholder="Website URL" tabindex="9">
			</div>
            <div class="form-group">
				<input type="text" name="keywords" id="keywords" class="form-control input-lg" placeholder="subject/keywords" required tabindex="10">
			</div>
     
            
            <div class="form-group">
				<textarea type="textarea" name="notes" id="notes" class="form-control input-lg" placeholder="Notes (optional)" tabindex="11"></textarea>
			</div>
            
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Add Publication" class="btn btn-primary btn-block btn-lg" tabindex="12"></div>
			</div>
		</form>
	</div>


<?php 

   } ?>

