                <h3 class="GxNoPrint">Export all Equipment Import Records to Excel | <a href="?equipment=yes">Back</a> | <button name="create_excel" id="create_excel" class="btn btn-success">Get Excel File</button> </h3><br />  
                <div class="table-responsive" id="employee_table">  
                        <?php  $results = getAllEquipmentImports(); ?>

<?php $content = "<table class=\"table table-bordered\">     
   <tr>
   <th scope=\"col\">Importer</th>
    <th scope=\"col\">Year</th>
    <th scope=\"col\">Month</th>
    <th scope=\"col\">Equipment</th>
    <th scope=\"col\">Refrigerant</th>
    <th scope=\"col\">Qty</th>
    <th scope=\"col\">Size</th>
    <th scope=\"col\">Brand</th>
    <th scope=\"col\" title=\"Country Of Origin\">COO</th>
  </tr>";
  
  
foreach($results as $row){
	$agent_name = getRecoveryAgentName($row['cid']);
	$content .= "<tr>
	<td>"  .$agent_name ."</td>
    <td>" . $row['year'] . "</td>
    <td>" . $row['month'] . "</td>
    <td>" . $row['equipment'] . "</td>
    <td>" . $row['refrigerant'] . "</td>
    <td>" . $row['quantity'] . "</td>
    <td>" . $row['size'] . "</td>
    <td>" . $row['brand'] . "</td>
    <td>" . $row['coo'] . "</td>
  </tr>";        
}
   
   $content .= "</table> ";
     echo $content;
	 
	 //put content in the database
	 storeTheExport($content); 
	 
   ?>

                </div>  
                <div align="center">  
                     <button name="create_excel" id="create_excel" class="btn btn-success">Get Excel File</button>  
                </div>  
           </div>  
           <br />  
   


<script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){   
           var page = "_inc/exports/excel_export.php?data=self";  
           window.location = page;  
      });  
 });  
 </script> 