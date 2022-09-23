<?php 
	$idBarang = htmlspecialchars($_POST['id_barang']); 
	$namaBarang = htmlspecialchars($_POST['nama_barang']);
	$jumlahBarang = htmlspecialchars($_POST['jml_barang']);
	$tglMasuk = htmlspecialchars($_POST['tgl_masuk']);

	$sql = "INSERT INTO tb_barang VALUES ('$idBarang', '$namaBarang', '$jumlahBarang', '$tglMasuk')";
	$mysqli->query($sql);

	echo '<script>
		alert("Data barang berhasil terinput!");
		document.location = "index.php?page=data_barang"; 
	</script>';

?>