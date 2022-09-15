<?php  
	global $mysqli;
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'admin_lte_db';

	$mysqli = new mysqli($host, $user, $pass, $db);

	if (mysqli_connect_errno()) {
		trigger_error('koneksi gagal! '. mysqli_connect_error(), E_USER_ERROR);
	}

?>

<html>
	<body>
		<table border="1" cellpadding="1">
			<tr>
				<td style="width: 40%;" align="center">
					<img src="../../asset/dist/img/AdminLTELogo.png" alt="logo" width="480" height="100">
				</td colspan="">
				<td style="width: 80%;">
					<h1 style="text-align: center;">Laporan Data User</h1>
				</td>
				<td style="width: 35%;" align="center">
					<p>Jln. Raya Hankam Kota Bekasi.</p>
				</td>
			</tr>
		</table>

		<!-- card user -->
		<?php 
			$no = 0;
            $sql = $mysqli->query("SELECT * FROM tb_user");
            while ($data = mysqli_fetch_array($sql)) :
            $no++;
		?>

		<table>
			<tr>
				<td colspan="3" style="width: 80%;">Kartu ID Karyawan</td>
			</tr>
			<tr>
				<td rowspan="3" style="width: 8%; height: 8%;">
					<?php 
						$kode = 'PT. Admin'. $data['id_user'] .' - '. $data['nama_user'] .'';
                        require_once '../../asset/phpqrcode/qrlib.php';
                        QRcode::png("$kode","Kode ". $no .".png","M", 2,2); 
					?>

					<img src="Kode <?= $no ?>.png" style="width: 80%; height: 80%;">
				</td>
			</tr>
			<tr>
				<td style="width: 20%;">NIK : <?=  $data['id_user'];?></td>
			</tr>
			<tr>
				<td>Nama : <?=  $data['nama_user'];?></td>
			</tr>
		</table>

		<?php  
			endwhile;
		?>
	</body>
</html>

<?php 
	$html = ob_get_contents();
	ob_end_clean();

	require_once '../../asset/html2pdf/html2pdf.class.php';
	$pdf = new Html2Pdf('P','A4','en');
	$pdf->writeHTML($html);
	$pdf->Output('laporan_user.pdf','D');

?>