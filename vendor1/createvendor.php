<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!------<title> Website Layout | CodingLab</title>------>
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <title>VENDOR</title>
</head>

<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">Leri's Stationary</a>
      </div>
      <ul style="padding-top: 20px;">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../buku/buku.php">Buku</a></li>
        <li><a href="../jenis/jenis.php">Jenis Buku</a></li>
        <li><a href="vendor.php">Vendor</a></li>
      </ul>
    </div>
  </nav>
  <div class="img">
  </div>
  <div class="a" style="left:20%;width:70%">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Id Vendor</label>
        <input type="text" class="form-control" id="idvendor" name="idvendor" style="width:50%" value="<?php echo idotomatis() ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" style="width:70%">
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="4" cols="50" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">No Telpon</label>
        <input type="text" class="form-control" id="notelp" name="notelp" style="width:50%">
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="submit"></input>
    </form>
  </div>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  create();
  header("location:./vendor.php");
}
function create()
{
  //create buku 
  include '../koneksi.php';
  $idvendor = $_POST['idvendor'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $notelp = $_POST['notelp'];
  $email = $_POST['email'];
  $status = 1;
  $query = "INSERT INTO vendor (id_vendor, nama_vendor, alamat_vendor, telp_vendor, email_vendor ,status) VALUES ('$idvendor', '$nama', '$alamat', '$notelp', '$email','$status')";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    echo "<script>alert('Data berhasil ditambah.');window.location='vendor.php';</script>";
  }
}
function idotomatis()
{
  include '../koneksi.php';
  $query = "SELECT max(id_vendor) as maxKode FROM vendor";
  $hasil = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_array($hasil);
  $idvendor = $data['maxKode'];
  $noUrut = (int) substr($idvendor, 3, 3);
  $noUrut++;
  $char = "VDR";
  $idvendor = $char . sprintf("%03s", $noUrut);
  return $idvendor;
}
?>