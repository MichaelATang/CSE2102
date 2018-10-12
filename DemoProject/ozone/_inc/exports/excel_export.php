 <?php  
 //open session
	if(!session_id()) {
        session_start();
    }
	include("../functions.php");
	//$settings = getAllSettings();

 //excel.php  
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename=ozone_contacts.'.rand().'.xls');  
 $content = getTheExportContent();
 echo $content; 
 ?>  