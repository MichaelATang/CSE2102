<a href="?listdata=yes" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-user"></span> List Data</a> 
<a href="?adddata=yes" class="btn btn-primary label label-default"><span class="glyphicon glyphicon-pencil"></span> Add Data</a>

<?php  


    if (isset($_GET['listdata'])){
        include("helpers/listdata_helper.php");
    } else
    
    if (isset($_GET['adddata'])){        
        include("helpers/addnewdata_helper.php");         
    } 
     
     

?>