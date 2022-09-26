<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
              <h3 class="card-title">List Tabel Data Transaksi</h3><br>
              <!-- option button -->
              <button type="button" class="btn text-light mt-1" data-toggle="modal" data-target="#modal-default" style="background-color: #130f40;">
                <i class="fa fa-plus mr-1"></i> Input Data Transaksi
              </button>
              <a href="page/transaksi/print_transaksi.php" target="_blank">
                <button type="button" class="btn text-light mt-1" style="background-color: #130f40;">
                  <i class="fas fa-file-pdf mr-1"></i> Print PDF
                </button>
              </a>
              <a href="page/transaksi/print_transaksi_excel.php">
                <button type="button" class="btn text-light mt-1" style="background-color: #130f40;">
                  <i class="fas fa-file-excel mr-1"></i> Print Excel
                </button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Item</th>
                    <th>Total</th>
                    <th>Tanggal Transaksi</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- menampilkan isi data -->
                  <?php  
                    $sql = $mysqli->query("SELECT * FROM tb_transaksi");
                    while ($data = mysqli_fetch_assoc($sql)) :
                  ?>
                  <tr>
                    <td><?= $data['id_transaksi']; ?></td>
                    <td><?= $data['nama_barang']; ?></td>
                    <td><?= $data['harga_satuan']; ?></td>
                    <td><?= $data['jumlah_barang']; ?></td>
                    <td><?= $data['total']; ?></td>
                    <td><?= $data['tanggal_transaksi']; ?></td>
                    <td>
                      <center>
                        <a href="index.php?page=edit_transaksi&kode=<?php echo $data['id_transaksi']; ?>">
                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="index.php?page=delete_transaksi&kode=<?php echo $data['id_transaksi']; ?>" onclick="return confirm('Anda yakin ingin menghapusnya?');">
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
      <b>Create By</b> Adji Muhamad Zidan -
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- modal form tambah data -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Input Data Transaksi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="index.php?page=input_data_transaksi">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">ID Transaksi</label>
                <input type="Text" class="form-control" placeholder="Masukan ID" name="id_transaksi">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Barang</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama_barang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Harga Satuan</label>
                <input type="Text" class="form-control" placeholder="Masukan Nama" name="harga_satuan">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Item</label>
                <input type="Text" class="form-control" placeholder="Masukan Status" name="jml_barang">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Transaksi</label>
                <input type="date" class="form-control" placeholder="Masukan Status" name="tgl_transaksi">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn text-light" style="background-color: #130f40;">Simpan Data</button>
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
  <!-- /.modal