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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>BUKU</title>
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
            <a style="background-color:black;" href="logout.php" onclick="return confirm('Yakin Ingin LogOut?')"><button type="button" class="btn btn-danger">LogOut</button></a>
        </div>
    </nav>
    <div class="img"></div>


    <div class="a">
        <h1>BUKU</h1>
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
                    <th>Buku</th>
                    <th>Jenis Buku</th>
                    <th>Vendor</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //view data jenis widh id
                include '../koneksi.php';
                $sql = "SELECT * FROM buku where statusBuku = 1";
                $result = mysqli_query($koneksi, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id_buku'];
                        $nama = $row['nama_buku'];
                        $jenis = $row['id_jenis_buku'];
                        $vendor = $row['id_vendor'];
                        $stok = $row['jml_stok'];
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
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $nama . "</td>";
                        echo "<td>" . $jenis . "</td>";
                        echo "<td>" . $vendor . "</td>";
                        echo "<td>" . $stok . "</td>";
                    }
                }

                ?>
            </tbody>
        </table>
        <button type="button" onclick="search()" class="btn btn-primary" id="btn">Convert To Excel</button>
    </div>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //agar show data hanya 5
            $('#example').DataTable({
                "lengthMenu": [5]
            });
        });

        function search() {
            var value = $('.dataTables_filter input').val();
            console.log(value); // <-- the value
            var data = {
                "search": value
            };
            $.post("../excel/Buku_excel.php", data);
            window.location.href = "../excel/Buku_excel.php?search=" + value;
        }
    </script>
</body>

</html>