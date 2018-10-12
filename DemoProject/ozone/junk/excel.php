 <?php  
 //excel.php  
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename=ozone_contacts.'.rand().'.xls');  
 echo $_GET["data"];  
 ?>  