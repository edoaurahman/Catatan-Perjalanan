<?php
include "../inc/config.php";
session_start();
// SIMPAN
if (isset($_POST['simpan'])) {
    $nik = $_SESSION['nik'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];
    // $lat = $_POST['lat'];
    // $long = $_POST['long'];

    $query = mysqli_query($conn, "INSERT INTO catatan (NIK,tanggal, jam, lokasi, suhu) VALUES ('$nik','$tanggal', '$jam', '$lokasi', '$suhu')");

    if ($query) {
        // $id_catatan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM catatan ORDER BY id DESC LIMIT 1"))['id'];
        // mysqli_query($conn, "INSERT INTO maps_location (id_maps,latitude,longitude,id_catatan,NIK) VALUES (NULL, '$lat', '$long', '$id_catatan','$nik')");
        echo "<script>alert('Data Berhasil Disimpan');window.location.href = '../pages/catatan.php';</script>";
        
    } else {
        echo "<script>alert('Data Gagal Disimpan');window.location.href = '../pages/isicatatan.php';</script>";
    }
}

//UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $lokasi = $_POST['lokasi'];
    $suhu = $_POST['suhu'];

    $query = mysqli_query($conn, "UPDATE catatan SET tanggal = '$tanggal', jam = '$jam', lokasi = '$lokasi', suhu = '$suhu' WHERE id = '$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil DiUpdate');window.location.href = '../pages/catatan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan');window.location.href = '../pages/isicatatan.php';</script>";
    }
}

//DELETE
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM catatan WHERE id = '$id'");

    if ($query) {
        echo "<script>alert('Data Berhasil Hapus');window.location.href = '../pages/catatan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Hapus');window.location.href = '../pages/isicatatan.php';</script>";
    }
}
