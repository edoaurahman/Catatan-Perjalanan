<?php 
session_start();
if (isset($_SESSION['nik'])) {
    echo "<script>alert('Logout terlebih dahulu ya !!!');window.location.href = 'pages/dashboard.php';</script>";

}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Login | Catatan Perjalanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/css/adminlte.css">

</head>

<body>

    <div class="container mt-5">
        <div class="col-lg-6 mx-auto">
            
            <form action="../inc/login_proses.php" enctype="multipart/form-data" class="form-login  mx-auto border rounded p-lg-5 p-3 shadow" method="POST">
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input required type="number" class="form-control" name="nik" id="nik" placeholder="NIK">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input required type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Password</label>
                    <input required type="text" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Foto</label>
                    <input required type="file" class="form-control-file border p-1 rounded" name="file" placeholder="Foto">
                </div>
                <button class="btn btn-success" type="submit" name="register">Register</button>
            </form>
            
        </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>