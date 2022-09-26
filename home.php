<?php 
  $sql_user = $mysqli->query("SELECT * FROM tb_user");
  $data_user = mysqli_num_rows($sql_user);

  $sql_barang = $mysqli->query("SELECT * FROM tb_barang");
  $data_barang = mysqli_num_rows($sql_barang);

  $sql_transaksi = $mysqli->query("SELECT * FROM tb_transaksi");
  $data_transaksi = mysqli_num_rows($sql_transaksi);  

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark text-xl">Selamat Datang Di Inventories Web</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $data_user; ?><sup style="font-size: 20px">%</sup></h3>
            <p>Data User / Admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="index.php?page=data_user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $data_barang; ?><sup style="font-size: 20px">%</sup></h3>
            <p>Data Barang</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="index.php?page=data_barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $data_transaksi; ?><sup style="font-size: 20px">%</sup></h3>
            <p>Data Transaksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="index.php?page=data_transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2022 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Create By</b> Adji Muhamad Zidan - 
    <b>Version</b> 3.0.5
  </div>
</footer>