<?php  
	$idTransaksi = htmlspecialchars($_POST['id_transaksi']);
	$namaBarang = htmlspecialchars($_POST['nama_barang']);
	$hargaSatuan = htmlspecialchars($_POST['harga_satuan']);
	$jumlahBarang = htmlspecialchars($_POST['jml_barang']);
	$total = $hargaSatuan * $jumlahBarang; 

	$tglTransaksi = htmlspecialchars($_POST['tgl_transaksi']);

	$sql = "INSERT INTO tb_transaksi VALUES ('$idTransaksi', '$namaBarang', $hargaSatuan, $jumlahBarang, 
	$total, '$tglTransaksi')";

	$mysqli->query($sql);

	echo '<script>
		alert("Data transaksi berhasil terinput!");
		document.location = "index.php?page=data_transaksi"; 
	</script>';

?>