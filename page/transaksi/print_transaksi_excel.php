<?php  
	require '../../config/koneksi.php';
	// convert ke format excel
	header('Content-Type:application/vnd-ms-excel');
	header('Content-disposition:attachment; filename=Data_transaksi.xls');

	$sql = $mysqli->query("SELECT * FROM tb_transaksi");  
?>

<h1>Data Barang</h1>
<table border="1">
	<tr style="text-align: center;">
		<th>ID Transaksi</th>
        <th>Nama Barang</th>
        <th>Harga Satuan</th>
        <th>Jumlah Item</th>
        <th>Total</th>
        <th>Tanggal Transaksi</th>
	</tr>
	<?php  
		while ($data = mysqli_fetch_assoc($sql)) :
	?>
	<tr style="text-align: center;">
		<td><?= $data['id_transaksi']; ?></td>
        <td><?= $data['nama_barang']; ?></td>
        <td><?= $data['harga_satuan']; ?></td>
        <td><?= $data['jumlah_barang']; ?></td>
        <td><?= $data['total']; ?></td>
        <td><?= $data['tanggal_transaksi']; ?></td>
	</tr>
	<?php  
		endwhile;
	?>
</table>