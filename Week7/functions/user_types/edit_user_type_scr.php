 <?php		

 //open session
 if(!session_id()) {
	session_start();
 }
 // include infrastructure 
 include("../functions.php");

//grab form data
$id = $_GET['id'];
$type = $_POST['type'];


updateUserType($id, $type);
$_SESSION['success'] = "The changes have been saved. Please review.";
print "<meta http-equiv=\"refresh\" content=\"0;URL=../../?manageusertypes=yes&edit={$id}\">";

 ?>