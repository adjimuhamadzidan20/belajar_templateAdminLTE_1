<?php  
	$userID = htmlspecialchars($_POST['id']);
	$userNama = htmlspecialchars($_POST['nama']);
	$userStatus = htmlspecialchars($_POST['status']);
	$userPass = htmlspecialchars($_POST['password']);

	$sql = "INSERT INTO tb_user VALUES ('$userID', '$userNama', '$userStatus', '$userPass')";
	$mysqli->query($sql);

	echo '<script>
		alert("Data berhasil ditambahkan!");
		document.location = "index.php?page=data_user"; 
	</script>';

?>