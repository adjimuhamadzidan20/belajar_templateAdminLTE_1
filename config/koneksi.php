<?php  
	global $mysqli;
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'admin_lte_db';

	$mysqli = new mysqli($host, $user, $pass, $db);

	if (mysqli_connect_errno()) {
		trigger_error('koneksi gagal! '. mysqli_connect_error(), E_USER_ERROR);
	}

?>