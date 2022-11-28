<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  delete($id);
}

function delete($id)
{
  include '../koneksi.php';
  $delete = mysqli_query($koneksi, "UPDATE vendor set status=0 WHERE id_vendor = '$id'");
  if ($delete) {
    echo "<script>alert('Data Berhasil Dihapus');window.location.href='./vendor.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus');window.location.href='./vendor.php'</script>";
  }
}
?>