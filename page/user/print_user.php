<?php  
	require_once __DIR__ . '/../../vendor/autoload.php';
	require '../../config/koneksi.php';
	require_once '../../asset/phpqrcode/qrlib.php';

	$sql = $mysqli->query("SELECT * FROM tb_user");

	$mpdf = new \Mpdf\Mpdf();
	$header = '	<div style="text-align: left; font-family: sans-serif;">
					<h1>Data User & Admin</h1>
					<hr style="color: black;">
				</div>';

	$main = '<table border="1" cellspacing="0" cellpadding="8" style="width: 100%; margin-top: 10px; text-align: center; 
	font-family: sans-serif;">
				<tr>
					<th>QRcode</th>
					<th>ID User</th>
					<th>Nama User</th>
					<th>Email</th>
					<th>Status</th>
				</tr>';
				while($data = mysqli_fetch_assoc($sql)) :
				$kode = $data['id_user'] .' '. $data['nama_user'];
				$main .= '<tr>
							<td>'. QRcode::png("$kode","Kode ". $kode .".png","M", 3);
							$main .= '<img src="Kode '. $kode .'.png">
						</td>
							<td>'. $data['id_user'] .'</td>
							<td>'. $data['nama_user'] .'</td>
							<td>'. $data['email'] .'</td>
							<td>'. $data['status'] .'</td>
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