<?php 
	error_reporting(error_reporting() & ~E_NOTICE);
	include 'koneksi.php';

	// ===== page user =====
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

	// ===== page barang =====
	else if ($_GET['page'] == 'data_barang') {
		include 'page/barang/data_barang.php';
	}

	else if ($_GET['page'] == 'input_data_barang') {
		include 'page/barang/input_data_barang.php';
	}

	else if ($_GET['page'] == 'delete_barang') {
		include 'page/barang/delete_data_barang.php';
	}

	else if ($_GET['page'] == 'edit_barang') {
		include 'page/barang/edit_data_barang.php';
	}

	// ===== page transaksi =====
	else if ($_GET['page'] == 'data_transaksi') {
		include 'page/transaksi/data_transaksi.php';
	}

	else if ($_GET['page'] == 'input_data_transaksi') {
		include 'page/transaksi/input_data_transaksi.php';
	}

	else if ($_GET['page'] == 'delete_transaksi') {
		include 'page/transaksi/delete_data_transaksi.php';
	}

	else if ($_GET['page'] == 'edit_transaksi') {
		include 'page/transaksi/edit_data_transaksi.php';
	}

	// === tampilan page home ===
	else {
		include 'home.php';
	}

?>