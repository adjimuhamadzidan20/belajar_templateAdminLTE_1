<?php 
	$sql = $mysqli->query("SELECT * FROM tb_barang WHERE id_barang = '$_GET[kode]'");
	$data = mysqli_fetch_assoc($sql);

	if (isset($_POST['edit'])) {
		$idBarang = $_GET['kode'];
		$namaBarang = htmlspecialchars($_POST['nama_barang']);
		$jumlahBarang = htmlspecialchars($_POST['jml_barang']);
		$tglMasuk = htmlspecialchars($_POST['tgl_masuk']);

		$sql = "UPDATE tb_barang SET 
				nama_barang = '$namaBarang', 
				jumlah_barang = '$jumlahBarang', 
				tanggal_masuk = '$tglMasuk'
				WHERE id_barang = '$idBarang'";

		$mysqli->query($sql);

		echo '<script>
			alert("Data barang berhasil diupdate!");
			document.location = "index.php?page=data_barang"; 
		</script>';
	}

?>

<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Edit Data Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=data_barang">Data Barang</a></li>
            <li class="breadcrumb-item active">Edit Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<form role="form" method="post">
	<div class="card-body">
	  <div class="form-group">
	    <label for="exampleInputEmail1">ID Barang</label>
	    <input type="Text" class="form-control" placeholder="Masukan ID" name="id_barang" value="<?= $data['id_barang']; ?>" disabled>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Barang</label>
	    <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama_barang" value="<?= $data['nama_barang']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Jumlah Barang</label>
	    <input type="Text" class="form-control" placeholder="Masukan Nama" name="jml_barang" value="<?= $data['jumlah_barang']; ?>">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tanggal Masuk</label>
	    <input type="date" class="form-control" placeholder="Masukan Status" name="tgl_masuk" value="<?= $data['tanggal_masuk']; ?>">
	  </div>
	<!-- /.card-body -->

	<div class="card-footer">
	  <button type="submit" class="btn text-light" style="background-color: #130f40;" onclick="return confirm('Edit data?');" name="edit"><i class="fa fa-edit"></i> Edit Data</button>
	</div>
</form>