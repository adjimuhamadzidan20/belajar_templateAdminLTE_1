<?php 
	error_reporting(error_reporting() & ~E_NOTICE);
	include 'koneksi.php';

	// === user ===
	if ($_GET['page'] == 'data_user') {
		include 'page/user/data_user.php';
	}

	else if ($_GET['page'] == 'create_user') {
		include 'page/user/create_user.php';
	}

	else if ($_GET['page'] == 'edit_user') {
		include 'page/user/edit_user.php';
	}

	else if ($_GET['page'] == 'proses_edit_user') {
		include 'page/user/proses_edit_user.php';
	}

	else if ($_GET['page'] == 'delete_user') {
		include 'page/user/proses_delete_user.php';
	}

	else if ($_GET['page'] == 'form_import_data') {
		include 'page/user/form_import_data.php';
	}

	// === barang ===
	else if ($_GET['page'] == 'data_barang') {
		include 'page/barang/data_barang.php';
	}

	// === transaksi ===
	else if ($_GET['page'] == 'data_transaksi') {
		include 'page/transaksi/data_transaksi.php';
	}

	// === tampilan home ===
	else {
		include 'home.php';
	}

?>