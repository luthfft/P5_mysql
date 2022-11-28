<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------<title> Website Layout | CodingLab</title>------>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script><script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

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
  <div class="img"></div>
  <?php
    //read vendor
    include '../koneksi.php';
    $idvendor = $_GET['id'];
    $query = "SELECT * FROM vendor WHERE id_vendor = '$idvendor'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $idvendor = $row['id_vendor'];
    $nama = $row['nama_vendor'];
    $alamat = $row['alamat_vendor'];
    $notelp = $row['telp_vendor'];
    $email = $row['email_vendor'];
    $status= $row['status'];
    ?>
  
  <div class="a">
  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Id Vendor</label>
        <input type="text" class="form-control" id="idvendor" name="idvendor" style="width:50%" value="<?php echo $idvendor ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama"style="width:70%" value="<?php echo $nama ?>">
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="4" cols="50" class="form-control"><?php echo $alamat ?></textarea>
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">No Telpon</label> 
        <input type="text" class="form-control" id="notelp" name="notelp" style="width:50%" value="<?php echo $notelp ?>">
      </div>
      <div class="mb-3">
        <label for="e" class="form-label">Email</label> 
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="submit"></input>
    </form>
  </div>

  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>
</html>
<?php
//update vendor
if (isset($_POST['submit'])){
    update();
    header("location:./vendor.php");
  }
function update(){
    include '../koneksi.php';
    $idvendor = $_POST['idvendor'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $status=1;
    $query = "UPDATE vendor SET nama_vendor='$nama', alamat_vendor='$alamat', telp_vendor='$notelp', email_vendor='$email',status='$status' WHERE id_vendor='$idvendor'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='vendor.php';</script>";
    }
}
?>