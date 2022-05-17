<?php 
session_start();
include '../inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
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

<body class="hold-transition sidebar-mini layout-fixed">
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
                            <h1 class="m-0">Update</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- get data -->
            <?php
            include "../inc/config.php";
            $id = $_GET['id'];
            $query = mysqli_query($conn, "SELECT * FROM catatan WHERE id = '$id'");
            $data = mysqli_fetch_assoc($query);
            ?>
            <!-- Main content -->
            <div>
                <div class="mt-3 border rounded p-3">
                    
                    <form action="../eksekusi/eksekusi.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">id</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" value="<?= $data['tanggal']?>" name="tanggal" value="<?php echo $data['tanggal'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam</label>
                            <input type="time" value="<?= $data['jam']?>" name="jam" value="<?php echo $data['jam'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi yang di kunjungi</label>
                            <input type="text" value="<?= $data['lokasi']?>" name="lokasi" value="<?php echo $data['lokasi'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Suhu Tubuh</label>
                            <input type="text" value="<?= $data['suhu']?>" name="suhu" value="<?php echo $data['suhu'] ?>" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-danger" name="update">Update</button>
                    </form>
                </div>

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
        <!-- AdminLTE for demo purposes -->
        <script src="../assets/js/pages/dashboard.js"></script>
</body>

</html>