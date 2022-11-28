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
  <title>JENIS</title>
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
        <li><a href="jenis.php">Jenis Buku</a></li>
        <li><a href="../vendor1/vendor.php">Vendor</a></li>
      </ul>

    </div>
  </nav>
  <div class="img">
  </div>
  <div class="a" style="left:20%;width:70%">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Id Jenis</label>
        <input type="text" class="form-control" id="idjenis" name="idjenis" style="width:50%" value="<?php echo idotomatis() ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama Jenis Buku</label>
        <input type="text" class="form-control" id="nama" name="nama" style="width:70%">
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
  header("location:./jenis.php");
}
function create()
{
  //create jenis_buku
  include '../koneksi.php';
  $idjenis = $_POST['idjenis'];
  $nama = $_POST['nama'];
  $status = 1;
  $sql = "INSERT INTO jenis_buku (id_jenis_buku, nama_jenis_buku,status) VALUES ('$idjenis', '$nama','$status')";
  $query = mysqli_query($koneksi, $sql);
  return $query;
}
function idotomatis()
{
  include '../koneksi.php';
  $query = mysqli_query($koneksi, "SELECT max(id_jenis_buku) as maxKode FROM jenis_buku");
  $data = mysqli_fetch_array($query);
  $idjenis = $data['maxKode'];
  $noUrut = (int) substr($idjenis, 3, 3);
  $noUrut++;
  $char = "JEN";
  $idjenis = $char . sprintf("%03s", $noUrut);
  return $idjenis;
}
?>