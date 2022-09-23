<?php  
	$sql = "DELETE FROM tb_barang WHERE id_barang = '$_GET[kode]'";
	$mysqli->query($sql);

	echo '<script>
		alert("Data barang berhasil terhapus");
		document.location = "index.php?page=data_barang"; 
	</script>';

?>