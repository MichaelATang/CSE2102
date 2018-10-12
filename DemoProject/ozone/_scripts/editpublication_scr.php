 <?php
 	//open session
	if(!session_id()) {
        session_start();
    }
 	// include infrastructure 
 	include("../_inc/functions.php");
	
	//grab form data
	$id = $_GET['id'];
	$author = $_POST['author'];
  	$journal_title = $_POST['journal_title'];
  	$title = $_POST['title'];
	$reviewers = $_POST['reviewers'];
	$abstract = $_POST['abstract'];
	$publisher = $_POST['publisher'];
	$publication_year = $_POST['publication_year'];
	$ref = $_POST['ref'];
	$keywords = $_POST['keywords'];
	$website = $_POST['website'];
	$notes = $_POST['notes'];
	
	//add publication
	updatePublication($id, $author, $journal_title, $title, $reviewers, $abstract, $publisher, $publication_year, $ref, $keywords, $website, $notes);
	
	//bounce out
	$_SESSION['success'] = "The changes have been saved!";
	print "<meta http-equiv=\"refresh\" content=\"0;URL=../?library=yes&view={$id}&ok=yes\">";
 ?>