<?php 
include '../../inc/config.php';
//DELETE
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $query = mysqli_query($conn, "DELETE FROM users WHERE NIK = '$nik'");

    if ($query) {
        mysqli_query($conn, "DELETE FROM maps_location WHERE NIK ='$nik'");
        mysqli_query($conn, "DELETE FROM catatan WHERE NIK ='$nik'");
        echo "<script>alert('Data Berhasil Hapus');window.location.href = '../../pages/admin/daftar_user.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Hapus');window.location.href = '../../pages/admin/daftar_user.php';</script>";
    }
}
?>
