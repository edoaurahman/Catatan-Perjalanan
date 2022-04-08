<?php
// Memanggil koneksi ke database
include '../inc/config.php';

// Memanggil Tool konversi ke PDF
include 'fpdf/fpdf.php';

// Menyiapkan Format PDF dan di masukkan ke dalam variabel $pdf 
$pdf = new FPDF();
// P = Potrait L = Landscape AddPage = Meyiapkan halaman baru A4 = ukuran kertas
$pdf->AddPage('P', 'A4');
// Setting tanggal sekarang
$tgl = date('d F Y');

// Untuk set FontFace ke Arial B = Bold 16 = Size
$pdf->setFont('Arial', 'B', 16);
$pdf->Cell(200, 6, 'CATATAN PERJALANAN', 0, 1, 'C');

$pdf->Cell(10, 8, '', 0, 1);

$pdf->setFont('Arial', 'B', 12);
session_start();
$nik = $_SESSION['nik'];
$sq1 = mysqli_query($conn, "SELECT * from users where NIK = '$nik'");
$nama = mysqli_fetch_assoc($sq1);
$pdf->Cell(10, 0, 'NAMA: ', 0, 1);
$pdf->Text(26, 25, $nama['nama']);
$pdf->Cell(10, 8, '', 0, 1);

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(10, 8, 'No', 1, 0, 'C');
$pdf->Cell(60, 8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(60, 8, 'Lokasi', 1, 0, 'C');
$pdf->Cell(60, 8, 'Suhu', 1, 0, 'C');
$pdf->Cell(10, 8, '', 0, 1);

if (isset($_GET['sort'])) {
  if ($_GET['q'] == 'normal') {
    $suhu = 37;
    $sort = $_GET['sort'];
    $sq1 = mysqli_query($conn, "SELECT * FROM catatan WHERE NIK = '$nik' AND $sort < $suhu");
  }else if($_GET['q'] == 'suhuTinggi'){
    $suhu = 37;
    $sort = $_GET['sort'];
    $sq1 = mysqli_query($conn, "SELECT * FROM catatan WHERE NIK = '$nik' AND $sort > $suhu");
  }else{
    $q = $_GET['q'];
    $sort = $_GET['sort'];
    $sq1 = mysqli_query($conn, "SELECT * from catatan  where NIK = '$nik' AND $sort LIKE '%$q%'");
  }
} else {
  $sq1 = mysqli_query($conn, "SELECT * from catatan  where NIK = '$nik'");
}
while ($r = mysqli_fetch_array($sq1)) {
  $pdf->Ln(0);
  $pdf->setFont('Arial', '', 7);
  $pdf->Cell(10, 8, $r['id'], 1, 0, 'C');
  $pdf->Cell(60, 8, $r['tanggal'], 1, 0);
  $pdf->Cell(60, 8, $r['lokasi'], 1, 0);
  $pdf->Cell(60, 8, $r['suhu'], 1, 0);
  $pdf->Cell(10, 8, '', 0, 1);
}
$pdf->Cell(10, 8, '', 0, 1);

$pdf->Output('catatan_perjalanan.pdf', 'I');
