<?php  
  session_start();

  require 'config/koneksi.php';

  // set cookie
  if (isset($_COOKIE['id_user']) && isset($_COOKIE['pass_user'])) {
    $id = $_COOKIE['id_user'];
    $pass = $_COOKIE['pass_user'];

    $sql = "SELECT nama_user FROM tb_user WHERE id_user = $id";
    $hasil = $mysqli->query($sql);
    $data = mysqli_fetch_assoc($hasil);

    if ($pass === hash('sha256', $data['pass_user'])) {
      $_SESSION['login'] == true;
    }

  }

  // set session
  if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
  }

  // proses login
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = htmlspecialchars($_POST['id']);
    $userPass = htmlspecialchars($_POST['pass']);

    $sql = "SELECT * FROM tb_user WHERE id_user = '$userID' AND password = '$userPass'";
    $result = $mysqli->query($sql);

    if (mysqli_num_rows($result) > 0) {
      $_SESSION['login'] = true;
      
      $rowAkun = mysqli_fetch_array($result);
      $_SESSION['index'] = $rowAkun['id_user'];
      $_SESSION['nama'] = $rowAkun['nama_user'];
      $_SESSION['status'] = $rowAkun['status'];

      // set remember me
      if (isset($_POST['remember'])) {
        setcookie('id_user', hash('sha256', $rowAkun['id_user']), time() + 60);
        setcookie('pass_user', hash('sha256', $rowAkun['password']), time() + 60);
      }

      header('Location: index.php');
      exit;
    } 

    else {
      header('Location: login.php?gagal');
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventories || Login</title>

  <style>
    * {
      font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
    }
  </style>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Inventories</b> Web</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Admin</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ID User" name="id" required> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn text-light btn-block" style="background-color: #130f40;">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php  
  if (isset($_GET['gagal'])) { ?>
    <tr>
      <td>
        <div>
          <p>Maaf, ID user dan password tidak valid</p>
        </div>
      </td>
    </tr>
<?php } ?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
