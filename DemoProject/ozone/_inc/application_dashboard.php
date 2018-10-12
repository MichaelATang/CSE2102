<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<h1>Welcome to your dashboard <?php echo getUserFirstName($_SESSION['logged_in_user_id']); ?></h1>	
<?php if (($_SESSION['logged_in_user_type'] === "officer") ||  ($_SESSION['logged_in_user_type'] === "admin")) { ?>
<h2 class="text-success">Quick Stats</h2>
<h3>Contacts: <a href="?contacts=yes"><?php echo totalContacts(); ?></a></h3>
<h3>Technicians: <a href="?technicians=yes"><?php echo totalTechnicianContacts(); ?></a></h3>
<h3>Publication/Books: <a href="?library=yes"><?php echo totalPublications(); ?></a></h3>
<h3>Equipment Import Records: <a href="?equipment=yes"><?php echo totalEquipmentRecords(); ?></a></h3>
<h3>Substance Import Records: <a href="?substance=yes"><?php echo totalSubstanceRecords(); ?></a></h3>
<h3>Recovery & Recycle Agents: <a href="?recovery=yes"><?php echo totalRecoveryAgents(); ?></a></h3>
<h4> > Total Recovery & Recycle Entries: <a href="?recovery=yes"><?php echo totalRecoveryEntries(); ?></a></h4>
<?php } ?>
</div>

