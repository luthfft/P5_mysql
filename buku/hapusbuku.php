<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  deletedata($id);
}

function deletedata($id)
{
  include '../koneksi.php';
  $delete = mysqli_query($koneksi, "UPDATE jenis_buku set status=0 WHERE id_jenis_buku = '$id'");
  if ($delete) {
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='./jenis.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus');window.location.href='./jenis.php'</script>";
  }
}
