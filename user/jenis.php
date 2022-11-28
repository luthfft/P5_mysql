<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------<title> Website Layout | CodingLab</title>------>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                <li><a href="index.php">Home</a></li>
                <li><a href="buku.php">Buku</a></li>
                <li><a href="jenis.php">Jenis Buku</a></li>
                <li><a href="vendor.php">Vendor</a></li>
            </ul>
            <a style="background-color:black;" href="../logout.php"><button type="button" class="btn btn-danger">LogOut</button></a>

        </div>
    </nav>
    <div class="img"></div>


    <div class="a">
        <h1>JENIS BUKU</h1>
        <?php

        session_start();

        if (!isset($_SESSION['nama'])) {
            header("Location: index.php");
        }
        echo "<h1>Selamat Datang Mahasiswa, " . $_SESSION['nama'] . "!" . "</h1>";

        ?>
        <table id="example" class="display" style="width:90%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama jenis Buku </th>
                </tr>
            </thead>
            <tbody>
                <?php
                //read jenis_buku
                include '../koneksi.php';
                $sql = "SELECT * FROM jenis_buku where status=1";
                $query = mysqli_query($koneksi, $sql);
                while ($jenis = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $jenis['id_jenis_buku'] . "</td>";
                    echo "<td>" . $jenis['nama_jenis_buku'] . "</td>";
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable({
                    "lengthMenu": [5]
                });
            });
        </script>
</body>

</html>