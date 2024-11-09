<!--stores all the session information and will be included in all files that needs this info-->
<?php
session_start();

if (isset($_GET['logout'])) {
	//code to close the session
	session_unset(); 
	// unset the session array i.e. destroy the data and the array
	session_destroy(); 
	// terminate the session.
	header('Location: index.php');
	//reload the index page.
}
?>