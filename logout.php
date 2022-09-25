<?php 
	session_start();

	// remove session
	$_SESSION = []; // meyakinkan session itu hilang 
	session_unset();
	session_destroy();
	header('Location: login.php');
	exit;

	// remove cookie
	setcookie('id_user', '', time() - 3600);
    	setcookie('pass_user', '', time() -3600);

?>
