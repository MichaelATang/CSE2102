<!-- File Version 2 Request-URI Too Long Bug Fix -->
                <h3 class="GxNoPrint">Export all <?php if (isset($_GET['technicians'])) echo "Technicians"; else echo "Contacts"; ?> to Excel | <a href="<?php if (isset($_GET['technicians'])) echo "?technicians=yes"; else echo "?contacts=yes"; ?>">Back</a> | <button name="create_excel" id="create_excel" class="btn btn-success">Get Excel File</button> </h3><br />  
                <div class="table-responsive" id="employee_table">  
                        <?php if (isset($_GET['technicians'])) $results = getAllTechnicianContacts(); else $results = getAllContacts(); ?>

<?php $content = "<table class=\"table table-bordered\">     
   <tr>
   <th scope=\"col\">Title</th>
    <th scope=\"col\">First Name</th>
    <th scope=\"col\">Last Name</th>
    <th scope=\"col\">Organisation</th>
    <th scope=\"col\">Job Title</th>
    <th scope=\"col\">Importer</th>
    <th scope=\"col\">Street</th>
    <th scope=\"col\">Village</th>
    <th scope=\"col\">Province</th>
    <th scope=\"col\">Region</th>
    <th scope=\"col\">eMail</th>
    <th scope=\"col\">Office Phone</th>
    <th scope=\"col\">Home Phone</th>
    <th scope=\"col\">Mobile Phone</th>
    <th scope=\"col\">Contact Type</th>
  </tr>";
  
  
foreach($results as $row){
	
	$content .= "<tr>
    <td>" . $row['title'] . "</td>
    <td>" . $row['fname'] . "</td>
    <td>" . $row['lname'] . "</td>
    <td>" . $row['organisation'] . "</td>
    <td>" . $row['job_title'] . "</td>
    <td>" . $row['importer'] . "</td>
    <td>" . $row['street'] . "</td>
    <td>" . $row['village'] . "</td>
    <td>" . $row['province'] . "</td>
    <td>" . $row['region'] . "</td>
    <td>" . $row['email'] . "</td>
    <td>" . $row['office_phone'] . "</td>
    <td>" . $row['home_phone'] . "</td>
    <td>" . $row['mobile_phone'] . "</td>
    <td>" . $row['type'] . "</td>
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