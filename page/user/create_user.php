<?php  
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// include library php mailer
	include 'asset/PHPMailer/src/Exception.php';
	include 'asset/PHPMailer/src/PHPMailer.php';
	include 'asset/PHPMailer/src/SMTP.php';

	$userID = htmlspecialchars($_POST['id']);
	$userNama = htmlspecialchars($_POST['nama']);
	$userEmail = htmlspecialchars($_POST['email']);
	$userStatus = htmlspecialchars($_POST['status']);
	$userPass = htmlspecialchars($_POST['password']);

	$sql = "INSERT INTO tb_user VALUES ('$userID', '$userNama', '$userEmail', '$userStatus', '$userPass')";
	$mysqli->query($sql);

	if (($mysqli)) {
		$emailPengirim = 'adjimuhamadzidan@gmail.com'; // email pengirim
		$namaPengirim = 'Belajar Web AdminLTE'; // nama pengirim
		$emailPenerima = $_POST['email']; // ambil email penerima dari form
		$subjek = 'Registration new user';
		$pesan = 'Selamat anda telah didaftarkan, user ID anda '. $userID . ' dan password '. $userPass .' silahkan login.';

		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->Host = 'smtp.gmail.com';
		$mail->Username = $emailPengirim; // email pengirim
		$mail->Password = 'saraukazkrvorpak';
		$mail->Port = 465;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPDebug = 2; // mengaktifkan debug

		$mail->setFrom($emailPengirim, $namaPengirim);
		$mail->addAddress($emailPenerima); 
		$mail->isHTML(true);
		$mail->Subject = $subjek;
		$mail->Body = $pesan;

		$send = $mail->send();

		// jika email berhasil dikirim
		if ($send) {
			echo '<h1>Email berhasil dikirim</h1>
			<br><a href="index.php">Kembali ke form</a>';
		} else {
			echo '<h1>Email gagal dikirim</h1>
			<br><a href="index.php">Kembali ke form</a>';
		}
	}

	echo '<script>
		alert("Data berhasil ditambahkan, dan email notifikasi terkirim!");
		document.location = "index.php?page=data_user"; 
	</script>';

?>

