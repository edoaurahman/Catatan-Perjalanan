<?php 
session_start();
if (isset($_SESSION['nik'])) {
    echo "<script>alert('Silahkan Logout Terlebih dahulu');document.location='/catatanPerjalanan1/pages/dashboard.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="./assets/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Catatan</b>Perjalanan</a>
      </div>
      <div class="card-body">
        

        <form action="./inc/login_proses.php" method="post">
          <div class="input-group mb-3">
            <input required type="number" name="nik" class="form-control" placeholder="NIK">
          </div>
          <div class="input-group mb-3">
            <input required type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div>
            <!-- /.col -->
            <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
            <a href="./pages/register.php" class="btn btn-success btn-block">Saya Pengguna Baru</a>
            <!-- /.col -->
          </div>
        </form>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/js/adminlte.min.js"></script>
</body>

</html>