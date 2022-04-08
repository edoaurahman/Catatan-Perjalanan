<?php
session_start();

require "./config.php";

$nik = $_POST['nik'];
$nama = addslashes($_POST['nama']);
$password = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE NIK = '$nik' AND password = '$password'");
$data = mysqli_fetch_assoc($query);


if (strlen($nik) != 16) {
    echo "<script>alert('Masukkan NIK dengan benar, min 16 digit');window.location.href = '/catatanPerjalanan1/pages/register.php';</script>";
}

if (isset($_POST['login'])) {
    if ($data) {
        if ($data['level'] == 'admin') {
            $_SESSION['nik'] = $nik;
            $_SESSION['level'] = $data['level'];
            header("Location: ../pages/admin/dashboard.php");
        } else {
            $_SESSION['nik'] = $nik;
            header("Location: ../pages/dashboard.php");
        }
    } else {
        echo "<script>alert('NIK atau nama salah');window.location.href = '../index.php';</script>";
    }
} else if (isset($_POST['register'])) {
    if (strlen($nik) != 16) {
        echo "<script>alert('Masukkan NIK dengan benar, min 16 digit');window.location.href = '/catatanPerjalanan1/pages/register.php';</script>";
        die();
    }

    $query = mysqli_query($conn, "SELECT * FROM users WHERE NIK = '$nik'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        echo "<script>alert('User Sudah terdaftar');window.location.href = '../index.php';</script>";
    } else {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $foto = $_FILES['file']['name'];
        $ambil = explode('.', $foto);
        $ekstensi = strtolower(end($ambil));
        $ukuran    = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                $query = mysqli_query($conn, "INSERT INTO `users` (`id`, `NIK`, `nama`, `foto`, `password`) VALUES (NULL, '$nik', '$nama', '$foto', '$password')");
                if ($query) {
                    move_uploaded_file($file_tmp, '../assets/img/' . $foto);
                    echo "<script>alert ('Registrasi Berhasil');document.location='../index.php'</script>";
                } else {
                    echo "<script>alert ('Registrasi Gagal');document.location='../admin/siswa/template_siswa.php?aksi=awal'</script>";

                    // echo ('Query Error : ' . mysqli_errno($conn) .
                    //     ' - ' . mysqli_error($conn));
                }
            } else {
                echo "<script>alert ('Ukuran file terlalu besar');document.location='../pages/register.php'</script>";
            }
        } else {
            echo "<script>alert ('Ekstensi tidak di perbolehkan');document.location='../pages/register.php'</script>";
        }
    }
}
