                <h3 class="GxNoPrint">Export all Publication Records to Excel | <a href="?library=yes">Back</a> | <button name="create_excel" id="create_excel" class="btn btn-success">Get Excel File</button> </h3><br />  
                <div class="table-responsive" id="employee_table">  
                        <?php  $results = getAllPublications(); ?>

<?php $content = "<table class=\"table table-bordered\">     
   <tr>
   <th scope=\"col\">Ref#</th>
    <th scope=\"col\">Title</th>
    <th scope=\"col\">Keywords</th>
    <th scope=\"col\">Author(s)</th>
    <th scope=\"col\">Journal</th>
    <th scope=\"col\">Publisher</th>
    <th scope=\"col\">Year</th>
  </tr>";
  
  
foreach($results as $row){
	
	$content .= "<tr>
    <td>" . $row['ref'] . "</td>
    <td>" . $row['title'] . "</td>
    <td>" . $row['keywords'] . "</td>
    <td>" . $row['author'] . "</td>
    <td>" . $row['journal_title'] . "</td>
    <td>" . $row['publisher'] . "</td>
    <td>" . $row['publication_year'] . "</td>
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