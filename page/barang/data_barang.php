<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Barang</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Tabel Data Barang</h3><br>
              <!-- option button -->
              <button type="button" class="btn btn-success mt-1" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i> Input Data Barang
              </button>
              <a href="page/barang/print_barang.php" target="_blank">
                <button type="button" class="btn btn-success mt-1">
                  <i class="fa fa-print"></i> Print PDF
                </button>
              </a>
              <a href="page/barang/print_barang_excel.php">
                <button type="button" class="btn btn-success mt-1">
                  <i class="fa fa-print"></i> Print Excel
                </button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal Masuk</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- menampilkan isi data -->
                  <?php  
                    $no = 0;
                    $sql = $mysqli->query("SELECT * FROM tb_barang");
                    while ($data = mysqli_fetch_assoc($sql)) :
                    $no++;
                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['id_barang']; ?></td>
                    <td><?= $data['nama_barang']; ?></td>
                    <td><?= $data['jumlah_barang']; ?></td>
                    <td><?= $data['tanggal_masuk']; ?></td>
                    <td>
                      <center>
                        <a href="index.php?page=edit_barang&kode=<?php echo $data['id_barang']; ?>">
                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="index.php?page=delete_barang&kode=<?php echo $data['id_barang']; ?>" onclick="return confirm('Anda yakin ingin menghapusnya?');">
                          <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                      </center>
                    </td>
                  </tr>
                  <?php 
                    endwhile;
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- modal form tambah data -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Input Data Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="index.php?page=input_data_barang">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">ID Barang</label>
                <input type="Text" class="form-control" placeholder="Masukan ID" name="id_barang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama_barang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Barang</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="jml_barang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Masuk</label>
                <input type="date" class="form-control" placeholder="Masukan Status" name="tgl_masuk">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->