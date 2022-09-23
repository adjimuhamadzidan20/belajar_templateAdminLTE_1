<?php  
	require '../../config/koneksi.php';
	// convert ke format excel
	header('Content-Type:application/vnd-ms-excel');
	header('Content-disposition:attachment; filename=Data_barang.xls');

	$sql = $mysqli->query("SELECT * FROM tb_barang");  
?>

<h1>Data Barang</h1>
<table border="1">
	<tr style="text-align: center;">
		<th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Tanggal Masuk</th>
	</tr>
	<?php  
		while ($data = mysqli_fetch_assoc($sql)) :
	?>
	<tr style="text-align: center;">
		<td><?= $data['id_barang']; ?></td>
        <td><?= $data['nama_barang']; ?></td>
        <td><?= $data['jumlah_barang']; ?></td>
        <td><?= $data['tanggal_masuk']; ?></td>
	</tr>
	<?php  
		endwhile;
	?>
</table>