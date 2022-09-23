<?php  
	$sql = $mysqli->query("SELECT * FROM tb_transaksi WHERE id_transaksi = '$_GET[kode]'");
	$data = mysqli_fetch_assoc($sql);

	if (isset($_POST['edit'])) {
		$idTransaksi = $_GET['kode'];
		$namaBarang = htmlspecialchars($_POST['nama_barang']);
		$hargaSatuan = htmlspecialchars($_POST['harga_satuan']);
		$jumlahBarang = htmlspecialchars($_POST['jml_barang']);
		$total = $hargaSatuan * $jumlahBarang; 

		$tglTransaksi = htmlspecialchars($_POST['tgl_transaksi']);

		$sql = "UPDATE tb_transaksi SET 
				nama_barang = '$namaBarang', 
				harga_satuan = $hargaSatuan, 
				jumlah_barang = $jumlahBarang,
				total = $total,
				tanggal_transaksi = '$tglTransaksi'
				WHERE id_transaksi = '$idTransaksi'";

		$mysqli->query($sql);

		echo '<script>
			alert("Data transaksi berhasil diupdate!");
			document.location = "index.php?page=data_transaksi"; 
		</script>';
	}

?>

<form role="form" method="post">
	<div class="card-body">
	  <div class="form-group">
	    <label for="exampleInputEmail1">ID Transaksi</label>
	    <input type="Text" class="form-control" placeholder="Masukan ID" name="id_barang" value="<?= $data['id_transaksi']; ?>" disabled>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Barang</label>
	    <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama_barang" value="<?= $data['nama_barang']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Harga Satuan</label>
	    <input type="Text" class="form-control" placeholder="Masukan Nama" name="harga_satuan" value="<?= $data['harga_satuan']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Jumlah Item</label>
	    <input type="Text" class="form-control" placeholder="Masukan Nama" name="jml_barang" value="<?= $data['jumlah_barang']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tanggal Transaksi</label>
	    <input type="date" class="form-control" placeholder="Masukan Status" name="tgl_transaksi" value="<?= $data['tanggal_transaksi']; ?>">
	  </div>
	<!-- /.card-body -->

	<div class="card-footer">
	  <button type="submit" class="btn btn-primary" onclick="return confirm('Edit data?');" name="edit"><i class="fa fa-edit"></i> Edit Data</button>
	</div>
</form>