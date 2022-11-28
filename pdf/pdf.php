<?php
require('../fpdf/fpdf.php');
require('../koneksi.php');
$data = $_GET['search'];
$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'LAPORAN DATA VENDOR', 0, 1, 'C');
$pdf->Ln();
$pdf->Text(10, 30, 'Polytechnic Astra');
$pdf->Text(10, 36, 'INFORMASI VENDOR DI LERI STATIONARY');
$yi = 50;
$ya = 44;
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(222, 222, 222);
$pdf->SetY($ya);
$pdf->SetX(10);
$pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'Nama Vendor', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Alamat Vendor', 1, 0, 'C', 1);
$pdf->Cell(25, 6, 'Telp Vendor', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Email Vendor', 1, 0, 'C', 1);
$ya = $yi + 0;


$sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor LIKE '%" . $data . "%' AND status = 1");
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE nama_vendor LIKE '%" . $data . "%' AND status = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE alamat_vendor LIKE '%" . $data . "%' AND status = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE telp_vendor LIKE '%" . $data . "%' AND status = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT * FROM vendor WHERE email_vendor LIKE '%" . $data . "%' AND status = 1");
}
$i = 1;
$no = 1;
$max = 31;
$row = 6;
while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id_vendor'];
    $nama = $data['nama_vendor'];
    $alamat = $data['alamat_vendor'];
    $telp = $data['telp_vendor'];
    $email = $data['email_vendor'];
    $pdf->SetY($ya);
    $pdf->SetX(10);
    $pdf->Cell(20, 6, $id, 1, 0, 'L', 0);
    $pdf->Cell(35, 6, $nama, 1, 0, 'L', 0);
    $pdf->Cell(50, 6, $alamat, 1, 0, 'L', 0);
    $pdf->Cell(25, 6, $telp, 1, 0, 'L', 0);
    $pdf->Cell(50, 6, $email, 1, 0, 'L', 0);
    $i = $i + 1;
    $no = $no + 1;
    $ya = $ya + $row;
    if ($i == $max) {
        $pdf->AddPage();
        $i = 1;
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(10, 30, 'Polytechnic Astra');
        $pdf->Text(10, 36, 'INFORMASI DATA VENDOR');
        $yi = 50;
        $ya = 44;
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->SetFillColor(222, 222, 222);
        $pdf->SetY($ya);
        $pdf->SetX(10);
        $pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
        $pdf->Cell(35, 6, 'Nama Vendor', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Alamat Vendor', 1, 0, 'C', 1);
        $pdf->Cell(25, 6, 'Telp Vendor', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'Email Vendor', 1, 0, 'C', 1);
        $ya = $yi + 0;
    }
}
$pdf->Ln();

$tgl = date('d-m-Y');
$pdf->Text(150, $ya + 6, 'Cikarang, ' . $tgl);
$pdf->Text(150, $ya + 12, 'Pimpinan');
$pdf->Text(150, $ya + 34, '__________________');
$filename  = 'laporan.pdf';
$pdf->Output($filename, 'I');
