                <h3 class="GxNoPrint">Export all Substance Import Records to Excel | <a href="?substance=yes">Back</a> | <button name="create_excel" id="create_excel" class="btn btn-success">Get Excel File</button> </h3><br />  
                <div class="table-responsive" id="employee_table">  
                        <?php  $results = getAllSubstanceImports(); ?>

<?php $content = "<table class=\"table table-bordered\">     
   <tr>
   <th scope=\"col\">Importer</th>
    <th scope=\"col\">Substance</th>
    <th scope=\"col\">Year</th>
    <th scope=\"col\" title=\"Quota Requested\">Requested (kg)</th>
    <th scope=\"col\" title=\"Quota Approved\">Approved (kg)</th>
    <th scope=\"col\" title=\"Quantity Imported\">Imported (kg)</th>
    <th scope=\"col\">Permit Issued</th>
    <th scope=\"col\">Date Examined</th>
    <th scope=\"col\" title=\"Remarks\">Remarks</th>
  </tr>";
  
  
foreach($results as $row){
	$agent_name = getRecoveryAgentName($row['cid']);
	$content .= "<tr>
	<td>"  .$agent_name ."</td>
    <td>" . $row['substance'] . "</td>
    <td>" . $row['year'] . "</td>
    <td>" . $row['quota_requested'] . "</td>
    <td>" . $row['quota_approved'] . "</td>
    <td>" . $row['quantity_imported'] . "</td>
    <td>" . $row['permit_issue_date'] . "</td>
    <td>" . $row['date_imported'] . "</td>
    <td>" . $row['remarks'] . "</td>
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