<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!------<title> Website Layout | CodingLab</title>------>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>HOME</title>
</head>

<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#">Leri's Stationary</a><br>
        <a href="#">

        </a>
      </div>
      <ul style="padding-top: 10px;padding-bottom:10px;">
        <li><a href="index.php">Home</a></li>
        <li><a href="./buku/buku.php">Buku</a></li>
        <li><a href="./jenis/jenis.php">Jenis Buku</a></li>
        <li><a href="./vendor1/vendor.php">Vendor</a></li>
      </ul>

      <a style="background-color:black;" href="logout.php" onclick="return confirm('Yakin Ingin LogOut?')"><button type="button" class="btn btn-danger">LogOut</button></a>
    </div>
  </nav>
  <div id="particles-js">
    <div class="a" style="left:25%;top:40%">
      <?php

      session_start();

      if (!isset($_SESSION['nama'])) {
        header("Location: index.php");
      }
      echo "<h1 style=margin-left:100px>Selamat Datang Admin, " . $_SESSION['nama'] . "!" . "</h1>";

      ?>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="card text-white bg-primary" style="max-width: 18rem;">
          <div class="card-header" style="font-size: 20px;text-align:center;">DATA BUKU</div>
          <div class="card-body">
            <h5 class="card-title" style="font-size: 80px; text-align:center;"><?php echo databuku() ?></h5>
          </div>
        </div>
        <div class="card text-white bg-secondary" style="max-width: 18rem;">
          <div class="card-header" style="font-size: 20px;text-align:center;">DATA JENIS</div>
          <div class="card-body">
            <h5 class="card-title" style="font-size: 80px; text-align:center;"><?php echo datajenis() ?></h5>
          </div>
        </div>
        <div class="card text-white bg-success" style="max-width: 18rem;">
          <div class="card-header" style="font-size: 20px;text-align:center;">DATA VENDOR</div>
          <div class="card-body">
            <h5 class="card-title" style="font-size: 80px; text-align:center;"><?php echo datavendor() ?></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Import Particles.js and app.js files -->
  <script src="particle/particles.js/particles.js">
  </script>
  <script src="particle/particles.js/demo/js/app.js">
  </script>
</body>

</html>
<?php
function databuku()
{
  //berapa total data buku
  include './koneksi.php';
  $sql = "SELECT COUNT(*) AS total FROM buku where statusBuku =1 ";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);

  return $data['total'];
}

function datajenis()
{
  include './Koneksi.php';
  $sql = "SELECT COUNT(*) AS total FROM jenis_buku where status =1 ";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);

  return $data['total'];
}

function datavendor()
{
  include './koneksi.php';
  $sql = "SELECT COUNT(*) AS total FROM vendor where status =1 ";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);

  return $data['total'];
}
?>