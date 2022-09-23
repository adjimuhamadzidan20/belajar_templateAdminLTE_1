<?php  
	require '../../config/koneksi.php';
	// convert ke format excel
	header('Content-Type:application/vnd-ms-excel');
	header('Content-disposition:attachment; filename=Data_user.xls');

	$sql = $mysqli->query("SELECT * FROM tb_user");  
?>

<h1>Data User & Admin</h1>
<table border="1">
	<tr style="text-align: center;">
		<th>ID User</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Status</th>
	</tr>
	<?php  
		while ($data = mysqli_fetch_assoc($sql)) :
	?>
	<tr style="text-align: center;">
		<td><?= $data['id_user']; ?></td>
		<td><?= $data['nama_user'];?></td>
		<td><?= $data['email'];?></td>
		<td><?= $data['status'];?></td>
	</tr>
	<?php  
		endwhile;
	?>
</table>