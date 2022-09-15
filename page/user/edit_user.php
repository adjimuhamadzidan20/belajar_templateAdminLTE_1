<?php 
    $sql = $mysqli->query("SELECT * FROM tb_user WHERE id_user = '$_GET[kode]'");
    $data = mysqli_fetch_assoc($sql);

?>

<form role="form" method="post" action="index.php?page=proses_edit_user">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">ID User</label>
      <input type="Text" class="form-control" placeholder="Masukan ID" name="id" value="<?php echo $data['id_user']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama User</label>
      <input type="Text" class="form-control" placeholder="Masukan Nama" name="nama" value="<?php echo $data['nama_user']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <input type="Text" class="form-control" placeholder="Masukan Status" name="status" value="<?php echo $data['status']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $data['password']; ?>">
    </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary" onclick="return confirm('Edit data?');"><i class="fa fa-edit"></i> Edit</button>
  </div>
</form>