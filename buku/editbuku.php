<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!------<title> Website Layout | CodingLab</title>------>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">Leri's Stationary</a>
      </div>
      <ul style="padding-top: 20px;">
        <li><a href="../index.php">Home</a></li>
        <li><a href="buku.php">Buku</a></li>
        <li><a href="../jenis/jenis.php">Jenis Buku</a></li>
        <li><a href="../vendor1/vendor.php">Vendor</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <?php
  include '../koneksi.php';
  $idbuku = $_GET['id'];
  //view data jenis and vendor with id
  $query = "SELECT * FROM buku WHERE id_buku='$idbuku'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
  $idbuku = $row['id_buku'];
  $nama = $row['nama_buku'];
  $jenis = $row['id_jenis_buku'];
  $vendor = $row['id_vendor'];

  $sql2 = "SELECT * FROM jenis_buku WHERE id_jenis_buku = '$jenis'";
  $result2 = mysqli_query($koneksi, $sql2);
  if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $jenis = $row2['nama_jenis_buku'];
    }
  }
  $sql3 = "SELECT * FROM vendor WHERE id_vendor = '$vendor'";
  $result3 = mysqli_query($koneksi, $sql3);
  if (mysqli_num_rows($result3) > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {
      $vendor = $row3['nama_vendor'];
    }
  }
  $jenis1 = $jenis;
  $vendor1 = $vendor;
  $stok = $row['jml_stok'];
  ?>
  <div class="a" style="left:20%;width:70%">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">Id Buku</label>
        <input type="text" class="form-control" id="idbuku" name="idbuku" value="<?php echo $idbuku ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama Buku</label>
        <input type="text" class="form-control" id="namabuku" name="namabuku" value="<?php echo $nama ?>">
      </div>
      <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select id="jenis" class="form-select" name="jenis">
          <option selected><?php echo $jenis1 ?></option>
          <?php
          include '../koneksi.php';
          $sql = "SELECT * FROM jenis_buku where status = 1 ";
          $result = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_jenis_buku'] . "'>" . $row['nama_jenis_buku'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="vendor" class="form-label"></label>Vendor</label>
        <select id="vendor" class="form-select" name="vendor">
          <option selected><?php echo $vendor1 ?></option>
          <?php
          include '../koneksi.php';

          $sql = "SELECT * FROM vendor where status =1";
          $result = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_vendor'] . "'>" . $row['nama_vendor'] . "</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Jumlah Stok</label>
        <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok ?>">
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="submit"></input>
    </form>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
  update();
  header("location:./buku.php");
}
function update()
{
  //update buku 
  include '../koneksi.php';
  $idbuku = $_POST['idbuku'];
  $namabuku = $_POST['namabuku'];
  $jenis = $_POST['jenis'];
  $vendor = $_POST['vendor'];
  $stok = $_POST['stok'];
  $status = 1;
  $query = "UPDATE buku SET nama_buku='$namabuku', id_jenis_buku='$jenis', id_vendor='$vendor', jml_stok='$stok',status='$status' WHERE id_buku='$idbuku'";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
    header("location: ./buku.php");
  } else {
    echo "Gagal";
  }
}
?>