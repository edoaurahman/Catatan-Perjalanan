<?php 
// include "../inc/config.php";
// session_start();
$nik = $_SESSION['nik'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE NIK = '$nik'");
$data = mysqli_fetch_assoc($query);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Catatan Perjalanan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/img/<?php echo $data['foto'];?>" class="" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $data['nama'] ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./isidata.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Isi Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="catatan.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Catatan Perjalanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./logout.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>