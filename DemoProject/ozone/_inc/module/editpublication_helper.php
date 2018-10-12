 <?php 
   if (isset($_SESSION['logged_in_user_type'])) {
	   ?>
    <div>
		<form role="form" action="_scripts/editpublication_scr.php?id=<?php echo $row['id']; ?>"  method="post" enctype="application/x-www-form-urlencoded" name="register">
			<h2>Edit/View Publication | <a href="?library=yes"><?php 
			if (isset($_GET['ok'])) echo "Return"; 
			 else echo "Cancel"; ?></a>
            </h2>
			<hr class="colorgraph">
            <div class="form-group">
            <label>Publication Title</label>
				<input type="text" name="title" id="title" class="form-control input-lg"  placeholder="Title" value="<?php echo $row['title']; ?>" required tabindex="1">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Author(s)</label>
                        <input type="text" name="author" id="author" class="form-control input-lg" placeholder="Author(s)" value="<?php echo $row['author']; ?>" required  tabindex="2">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                    <label>Journal Title</label>
						<input type="text" name="journal_title" id="journal_title" class="form-control input-lg" placeholder="Journal Title" value="<?php echo $row['journal_title']; ?>" tabindex="3">
					</div>
				</div>
			</div>
            <div class="form-group">
            <label>Reviewers</label>
				<input type="text" name="reviewers" id="reviewers" class="form-control input-lg" placeholder="Reviewer(s)" value="<?php echo $row['reviewers']; ?>" tabindex="4">
			</div>
			
            <div class="form-group">
            <label>Publisher</label>
				<input type="text" name="publisher" id="publisher" class="form-control input-lg" placeholder="Publisher" value="<?php echo $row['publisher']; ?>" tabindex="5">
			</div>
            
			<div class="form-group">
            <label>Abstract</label>
				<textarea type="textarea" name="abstract" id="abstract" class="form-control input-lg" placeholder="Abstract" tabindex="6"><?php echo $row['abstract']; ?></textarea>
			</div>
            
                  
			 <div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
                <label>Publication Year</label>
					<div class="form-group">
						<input type="text" name="publication_year" id="publication_year" class="form-control input-lg" placeholder="YYYY" value="<?php echo $row['publication_year']; ?>" tabindex="7">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
                <label>Reference #</label>
					<div class="form-group">
                        <input type="text" name="ref" id="ref" class="form-control input-lg " value="<?php echo $row['ref']; ?>" data-wrap="true" tabindex="8">
					</div>
				</div>
			</div>	
            
            <div class="form-group">
            <label>Keywords</label>
				<input type="text" name="keywords" id="keywords" class="form-control input-lg" placeholder="subject/keywords" value="<?php echo $row['keywords']; ?>" required tabindex="9">
			</div>
            
             <div class="form-group">
            <label>Website URL</label>
				<input type="text" name="website" id="website" class="form-control input-lg" placeholder="website url" value="<?php echo $row['website']; ?>" tabindex="9">
			</div>
     
            
            <div class="form-group">
            <label>Notes</label>
				<textarea type="textarea" name="notes" id="notes" class="form-control input-lg" placeholder="Notes (optional)" tabindex="10"><?php echo $row['notes']; ?></textarea>
			</div>
            
			<hr class="colorgraph">
            <?php if (!isset($_GET['ok'])) { ?>
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Save Changes" class="btn btn-primary btn-block btn-lg" tabindex="11"></div>
			</div>
            <?php } ?>
		</form>
	</div>


<?php 

   } ?>

