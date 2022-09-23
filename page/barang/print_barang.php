<?php  
	require_once __DIR__ . '/../../vendor/autoload.php';
	require '../../config/koneksi.php';

	$sql = $mysqli->query("SELECT * FROM tb_barang");

	$mpdf = new \Mpdf\Mpdf();
	$header = '	<div style="text-align: left; font-family: sans-serif;">
					<h1>Data Barang</h1>
					<hr style="color: black;">
				</div>';

	$main = '<table border="1" cellspacing="0" cellpadding="8" style="width: 100%; margin-top: 10px; text-align: center; 
	font-family: sans-serif;">
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah Barang</th>
					<th>Tanggal Masuk</th>
				</tr>';
				while($data = mysqli_fetch_assoc($sql)) :
				$main .= '<tr>
							<td>'. $data['id_barang'] .'</td>
							<td>'. $data['nama_barang'] .'</td>
							<td>'. $data['jumlah_barang'] .'</td>
							<td>'. $data['tanggal_masuk'] .'</td>
						</tr>';
				endwhile;
	$main .= '</table>';

	$date = '<div style="text-align: right; margin-top:60px; font-family: sans-serif;">
			 	<p>Jakarta, '. date("d F Y") .'</p>
			 	<br><br>
			 	<p>Admin</p>
			 </div>';

	$mpdf->writeHTML($header);
	$mpdf->writeHTML($main);
	$mpdf->writeHTML($date);
	$mpdf->Output('Print_User&Admin.pdf', \Mpdf\Output\Destination::INLINE);

?>