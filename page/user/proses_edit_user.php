<?php  
	$userID = htmlspecialchars($_POST['id']);
	$userNama = htmlspecialchars($_POST['nama']);
	$userStatus = htmlspecialchars($_POST['status']);
	$userPass = htmlspecialchars($_POST['password']);

	$sql = "UPDATE tb_user SET 
			nama_user = '$userNama', 
			status = '$userStatus', 
			password = '$userPass' 
			WHERE id_user = '$userID'";

	$mysqli->query($sql);

	echo '<script>
		alert("Data berhasil diupdate!");
		document.location = "index.php?page=data_user"; 
	</script>';

?>