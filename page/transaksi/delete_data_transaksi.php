<?php  
	$sql = "DELETE FROM tb_transaksi WHERE id_transaksi = '$_GET[kode]'";
	$mysqli->query($sql);

	echo '<script>
		alert("Data transaksi berhasil terhapus");
		document.location = "index.php?page=data_transaksi"; 
	</script>';

?>