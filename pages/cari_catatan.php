
<?php
include "../inc/config.php";
session_start();
if (!isset($_SESSION['nik'])) {
  echo "<script>alert('Silahkan Login Terlebih dahulu');document.location='/catatanPerjalanan1/index.php'</script>";
}
$nik = $_SESSION['nik'];
if (isset($_GET['sort'])) {
  $sort = $_GET['sort'];
  $q = $_GET['q'];
  $tabel = mysqli_query($conn, "SELECT * FROM catatan INNER JOIN maps_location on catatan.id = maps_location.id_catatan WHERE catatan.NIK = '$nik' AND $sort LIKE '%$q%'");
} else {
  $tabel = mysqli_query($conn, "SELECT * FROM catatan INNER JOIN maps_location on catatan.id = maps_location.id_catatan WHERE catatan.NIK = '$nik'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catatan Perjalanan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="<?php if ($_GET['q'] == 'suhuTinggi') {
                                                                  echo 'panas()';
                                                                } ?>">
  <div class="wrapper">
    <?php include "./layouts/navbar.php" ?>

    <?php include "./layouts/sidenavbar.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Catatan Perjalanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Catatan Perjalanan</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div>
            <div class="border mt-3 p-2 table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Suhu Tubuh</th>
                    <th>MAPS</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($data = mysqli_fetch_assoc($tabel)) {
                  ?>
                    <tr class="table-search">
                      <td scope="row"><?php echo $data['tanggal'] ?></td>
                      <td><?php echo $data['jam'] ?></td>
                      <td><?php echo $data['lokasi'] ?></td>
                      <td><?php echo $data['suhu'] ?></td>
                      <td><iframe src="https://maps.google.com/maps?q=<?= $data['latitude']; ?>, <?= $data['longitude']; ?>&output=embed" height="270" frameborder="0" style="border:0"></iframe>
                      </td>
                      <td>
                        <a class="btn btn-primary" href="./update.php?id=<?php echo $data['id'] ?>">Update</a>
                        <a class="btn btn-danger" href="../eksekusi/eksekusi.php?id= <?php echo $data['id'] ?>">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <h3 id="notFound" class="text-center d-none">Tidak Menemukan data lain...</h3>
            </div>

            <div>
              <a href="./isidata.php" class="btn btn-danger m-3">Isi data</a>
              <a href="../eksekusi/print_catatan.php?q=<?= $q ?>&sort=<?= $sort ?>" class="btn btn-primary m-3">Cetak</a>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021-2022 Ridho Aulia' Rahman </strong>
      All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/js/adminlte.js"></script>
  <script src="../assets/js/script.js"></script>
  <!-- AdminLTE for demo purposes -->
</body>

</html>