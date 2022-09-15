<?php 
	$sql = $mysqli->query("DELETE FROM tb_user WHERE id_user = '$_GET[kode]'");
	$mysqli->query($sql);

	echo '<script>
		alert("Data berhasil terhapus");
		document.location = "index.php?page=data_user"; 
	</script>';

?>