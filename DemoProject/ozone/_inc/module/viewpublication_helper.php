 <?php 
  if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>View Publication <span class="GxNoPrint">| <?php if ($_SESSION['logged_in_user_type'] == 'admin') { ?><a href="?library=yes&edit=<?php echo $_GET['view']; ?>">Edit</a> |<?php } ?> <a href="?library=yes">Close</a></span> </h2>
			<hr class="colorgraph">
            <table width="100%" id="gxtable" class="table table-striped table-bordered">
  <tr>
    <td>Title</td>
    <td><strong><?php echo $publication['title']; ?></strong></td>
  </tr>
  <tr>
    <td width="32%">Author</td>
    <td width="68%"><strong><?php echo $publication['author']; ?></strong></td>
  </tr>
  <tr>
    <td>Journal Title</td>
    <td><strong><?php echo $publication['journal_title']; ?></strong></td>
  </tr>
  <tr>
    <td>Reviewers</td>
    <td><strong><?php echo $publication['reviewers']; ?></strong></td>
  </tr>
  <tr>
    <td>Keywords</td>
    <td><strong><?php echo $publication['keywords']; ?></strong></td>
  </tr>
  <tr>
    <td>Abstract</td>
    <td><strong><?php echo $publication['abstract']; ?></strong></td>
  </tr>
  <tr>
    <td>Publisher</td>
    <td><strong><?php echo $publication['publisher']; ?></strong></td>
  </tr>
  <tr>
    <td>Publication Year</td>
    <td><strong><?php echo $publication['publication_year']; ?></strong></td>
  </tr>
  <tr>
    <td>Website URL</td>
    <td><a href="<?php echo $publication['website']; ?>" target="_blank"><strong><?php echo $publication['website']; ?></strong></a></td>
  </tr>
  <tr>
    <td>Reference #</td>
    <td><strong><?php echo $publication['ref']; ?></strong></td>
  </tr>
  <tr>
    <td>Notes</td>
    <td><strong><?php echo $publication['notes']; ?></strong></td>
  </tr>
</table>
			<hr class="colorgraph">
			
	
	</div>



<?php 

   } ?>

