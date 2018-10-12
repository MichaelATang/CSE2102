 <?php 
    if (($_SESSION['logged_in_user_type'] == 'admin') || ($_SESSION['logged_in_user_type'] == 'officer')) {
	   ?>

<h1>Publication Management <span class="GxNoPrint">| <a href="?library=yes&add=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Add New Publication</a></span> | <a href="?library=yes&export=yes" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Export List to Excel</a></span></h1>
                   
<?php
if (isset($_GET['export'])) {
  include('_inc/exports/library_exports.php'); } 
//if add do
else if (isset($_GET['add'])) {
	//Adding New User
	include('addnewpublication_helper.php');
} else if (isset($_GET['view'])) {
	$publication = getPublication($_GET['view']);
	include('viewpublication_helper.php');

} else if (isset($_GET['edit'])) {
	$row = getPublication($_GET['edit']);
	echo "Editing Publication: <b>". $row['title'] . '</b>';
	include('editpublication_helper.php');
	
}	else if (isset($_GET['del'])) {
	$who = getUserFirstName($_SESSION['logged_in_user_id']);
	makelog($_SESSION['logged_in_user_id'], $_SESSION['logged_in_user_type'], getRealIpAddr(), "{$who} deleted publication");
	deletePublication($_GET['del']);
	//set success message then bounce 
	$_SESSION['success'] = "The publication has been deleted!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=?library=yes\">";
} else {

if (isset($_GET['show'])) 
	$results = getSinglePublication($_GET['show']);
else 
	//just list all publications
	$results = getAllPublications();
?>
<table id="gxtable" class="table table-striped table-bordered">
  <thead>
  <tr>
  	<th scope="col">Ref#</th>
    <th scope="col">Title</th>
    <th scope="col">Keywords</th>
    <th scope="col">Author(s)</th>
    <th scope="col">Journal</th>
    <th scope="col">Publisher</th>
    <th scope="col">Year</th>
    <th scope="col" class="GxNoPrint">Action</th>
  </tr>
  </thead>
   <tfoot>
  <tr>
    <th scope="col">Ref#</th>
    <th scope="col">Title</th>
    <th scope="col">Keywords</th>
    <th scope="col">Author(s)</th>
    <th scope="col">Journal</th>
    <th scope="col">Publisher</th>
    <th scope="col">Year</th>
    <th scope="col" width="80px" class="GxNoPrint">Action</th>
  </tr>
  </tfoot>
  <tbody>
<?php 
 
foreach($results as $row){
	?>
		<tr>
     <td><?php echo $row['ref'];?></td>   
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['keywords']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo $row['journal_title']; ?></td>
    <td><?php echo $row['publisher']; ?></td>
    <td><?php echo $row['publication_year']; ?></td>
    <td class="GxNoPrint"> 
	
	<?php if (($_SESSION['logged_in_user_type'] == "admin") || ($_SESSION['logged_in_user_type'] == 'officer')) { ?><a class="btn btn-xs btn-danger glyphicon glyphicon-trash" title="DELETE PUBLICATION" href="#" onClick="linkRef('?library=yes&del=<?php echo $row['id']; ?>')"></a>

     <a class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit/View publication" href="?library=yes&edit=<?php echo $row['id']; ?>"></a> <?php } ?>
     
     <a class="btn btn-xs btn-success glyphicon glyphicon-zoom-in" title="View Publication" href="?library=yes&view=<?php echo $row['id']; ?>"></a>
     </td>
  </tr>
<?php        
}
?>
</tbody>
</table>

<?php 
// just listing all publications if not add nor edit
}
   } // if logged in as admin
?>

