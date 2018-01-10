<?
	session_start();
	session_unset();
	// Finally, destroy the session.
	session_destroy();
	header("Location:index.php") ; 	
?>