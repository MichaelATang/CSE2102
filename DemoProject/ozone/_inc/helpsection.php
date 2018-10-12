<h1>General Help</h1>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#gc">Contacts & Technicians</a></li>
  <li><a data-toggle="tab" href="#ei">Equipment & Substance Imports</a></li>
  <li><a data-toggle="tab" href="#library">Library</a></li>
  <li><a data-toggle="tab" href="#recovery">Recovery & Recycling</a></li>
</ul>

<div class="tab-content">
  <div id="gc" class="tab-pane fade in active"> <h2>Contacts </h2>
    <p>The "Contacts" database is where all contacts are stored. The "Technicians" database is filtered subset of the "Contacts" database.</p>
    <h3>List </h3>
    <p>By default, all contacts in the system are listed and are ordered &quot;First Name&quot;. On the opening screen, only 10 contacts are shown, if you would like to see more than 10 then you  can select the number of entries you would like to see. </p>
    <h3>Search</h3>
    <p>You can use the &quot;Search&quot; feature to find a contact either by first name, last name, orgranisation, email address, type, address or phone number. You can use the search feature to in combination with the column order to find a specific set of records. For example, if you would like to see all &quot;Technicians&quot; then you can either use the column order of search for &quot;Technician&quot;.  </p>
    <h3>Types</h3>
    <p>Contacts are saved in the system and are categorised by contact "Type". The active contact &quot;Type&quot; are as follows: <b> <?php 
						$contact_types = getSelectSettings('contact_categories');;
						foreach ($contact_types as $contact_type) { 
							 echo $contact_type . " : "; 
						 }
					?>
    </b> </p>
    <p>The contact type can be edited by the administrator of the database in the system setting of the database.</p>
    <h3>Adding a New Contact</h3>
    <p>To add a new contact it is easy, click on &quot;Contacts&quot; then click on &quot;Add New&quot;. Once a contact is added, you can add many kinds of database records to it - Equipment Import, Substance Import and Recovery &amp; Recycling entries. The contact database is the primary database in the system. </p>
    <h3>Editing Contacts</h3>
    <p>Only admins can edit contacts. To edit a contact record, you must find the specific contact and click on the edit button on the right of the record. </p>
    <h3>Deleting Contacts</h3>
    <p>Again, only admins can delete contact records. To delete a contact record, you must find the specific record and click on the delete button. <span class="bg-danger">Once a contact is deleted, all records for that contact is removed from the system: import records, recovery and recycling eltries, etc.</span> </p>
    <h3>Mailing List</h3>
    <p>To export a complete mailing list for all contacts, click on 'contacts&quot; then click on &quot;Mailing List&quot;. This will produce a list of all contacts in the system with the fields relevant for a mailing list. Scroll to the bottom of the list and click on &quot;Create Excel File&quot; to export a mailing list in Microsoft Excel format. </p>
  </div>
  
  <div id="ei" class="tab-pane fade">
    <h2>Equipment & Substance Imports</h2>
    <p>The "Equipment Imports" and &quot;Substances Imports&quot; databases capture all the import records for importers in the system.</p>
    <h3>List</h3>
    <p>By default, all records are listed and ordered by the name of the importer. On the opening screen, only 10 records are shown, if you would like to   see more than 10 then you  can select the number of entries you would   like to see. You can change the sorting order and use the &quot;Search&quot; feature to find a specific record. </p>
    <h3>Printing </h3>
    <p>You can print any record by (1) clicking on the record and (2) clicking on &quot;Print&quot; from the application menu. </p>
    <h3>Adding a New Record</h3>
    <p>Click on the &quot;Add New Record' button and select the importer form the drop-down list. If the importer is not in the list, then you must add the importer in the contact database and set importer status to &quot;Yes&quot;. If the contact is in the database but not in the importer list on the &quot; new record&quot; screen, then you may need to edit the importer in the contact database and set the importer status to &quot;Yes&quot;. </p>
    <h3>Editing &amp; Deleting a Record</h3>
    <p>You can edit an entry after the record has been added but clicking on the &quot;Edit&quot; button. You can also delete a record by clicking on the &quot;Delete Record&quot; button. if you do not see these options then you may need to execute these actions through your administrator. </p>
    <p>&nbsp;</p>
    
  </div>
  <div id="library" class="tab-pane fade">
    <h2>Library</h2>
    <p>The 'Library" database records all publications in the NOAU.</p>
    <h3>Publication List</h3>
    <p>By default, all publications in the system are listed and are ordered by the &quot;Title&quot;. On the opening screen, only 10 publications are shown, if you would   like to see more than 10 then you  can select the number of entries you   would like to see. You can filter the publication list by using the &quot;Search&quot; field on the top-right of the database window.</p>
    <h3>Adding a New Publications</h3>
    <p>Click on the &quot;Add New Publication&quot; button and fill in the details for the new publication. </p>
    <h3>Edit a Publication</h3>
    <p>Find the publication you would like to edit and then click on the edit button. Make the required changes and then click on &quot;Save changes&quot; to complete the process. The edit feature is only available to administrator-level users in the system. </p>
    <h3>Delete a Publication</h3>
    <p>You can delete a publication by find the required publicatio and clicking on the delete button. </p>
  </div>
  <div id="recovery" class="tab-pane fade">
    <h2>Recovery & Recycling</h2>
    <p>The Recovery &amp; Recycling database allows for the agency to keep track of all data pertaining to the recovery, storage, reuse and recycle of ozone related substances. </p>
    <h3>Adding Records</h3>
    <p>Records are added to Technician/Company. </p>
    <ol>
    <li>Click on &quot;Add New Organisation/Technician&quot; and select the correct details.</li>
    <li>Click on the &quot;View&quot; button and then you can begin to add records. </li>
    <li>Click on &quot;Add New Entry&quot; to access the drop-down add screen and fill in the details and click on &quot;Add Entry&quot;. </li>
    <li>Click on &quot;Add Entry Notes&quot; if you would like to add entry notes </li>
    </ol>
    <h3>Deleting Entries</h3>
    <p>You can delete an entry by clicking on the &quot;Quarter&quot; label. </p>
    
  </div>
</div>