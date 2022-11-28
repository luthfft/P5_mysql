<?php
require '../vendor/autoload.php';
require '../koneksi.php';
$data = $_GET['search'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'LAPORAN DATA BUKU');
$sheet->setCellValue('A2', 'Polytechnic Astra');
$sheet->setCellValue('A3', 'INFORMASI BUKU DI LERI STATIONARY');
$sheet->setCellValue('A5', 'NO');
$sheet->setCellValue('B5', 'ID');
$sheet->setCellValue('C5', 'Nama Buku');
$sheet->setCellValue('D5', 'Jenis Buku');
$sheet->setCellValue('E5', 'Jenis Vendor');
$sheet->setCellValue('F5', 'Jumlah Stok');

$sql = mysqli_query($koneksi, "SELECT id_buku,nama_buku,nama_jenis_buku,nama_vendor,jml_stok,statusBuku FROM buku 
    inner join jenis_buku on buku.id_jenis_buku = jenis_buku.id_jenis_buku
    inner join vendor on buku.id_vendor = vendor.id_vendor
    WHERE id_buku LIKE '%" . $data . "%' AND statusBuku = 1");
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT id_buku,nama_buku,nama_jenis_buku,nama_vendor,jml_stok,statusBuku FROM buku 
    inner join jenis_buku on buku.id_jenis_buku = jenis_buku.id_jenis_buku
    inner join vendor on buku.id_vendor = vendor.id_vendor
    WHERE nama_buku LIKE '%" . $data . "%' AND statusBuku = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT id_buku,nama_buku,nama_jenis_buku,nama_vendor,jml_stok,statusBuku FROM buku 
    inner join jenis_buku on buku.id_jenis_buku = jenis_buku.id_jenis_buku
    inner join vendor on buku.id_vendor = vendor.id_vendor
     WHERE nama_jenis_buku LIKE '%" . $data . "%' 
     AND statusBuku = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT id_buku,nama_buku,nama_jenis_buku,nama_vendor,jml_stok,statusBuku FROM buku 
    inner join jenis_buku on buku.id_jenis_buku = jenis_buku.id_jenis_buku
    inner join vendor on buku.id_vendor = vendor.id_vendor
    WHERE nama_vendor LIKE '%" . $data . "%'
    AND statusBuku = 1");
}
if (mysqli_num_rows($sql) == 0) {
    $sql = mysqli_query($koneksi, "SELECT id_buku,nama_buku,nama_jenis_buku,nama_vendor,jml_stok,statusBuku FROM buku 
    inner join jenis_buku on buku.id_jenis_buku = jenis_buku.id_jenis_buku
    inner join vendor on buku.id_vendor = vendor.id_vendor
    WHERE email_vendor LIKE '%" . $data . "%' AND statusBuku = 1");
}
$i = 6;
$no = 1;
while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id_buku'];
    $nama = $data['nama_buku'];
    $jenis = $data['nama_jenis_buku'];
    $vendor = $data['nama_vendor'];
    $stok = $data['jml_stok'];
    $status = $data['statusBuku'];
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $id);
    $sheet->setCellValue('C' . $i, $nama);
    $sheet->setCellValue('D' . $i, $jenis);
    $sheet->setCellValue('E' . $i, $vendor);
    $sheet->setCellValue('F' . $i, $stok);
    $no++;
    $i++;
}

$writer = new Xlsx($spreadsheet);
ob_clean();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan Data Buku.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
