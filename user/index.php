<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------<title> Website Layout | CodingLab</title>------>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav>
        <div class="menu">
            <div class="logo">
                <a href="#">Leri's Stationary</a>
                </a>
            </div>
            <ul style="padding-top: 10px;padding-bottom:10px;">
                <li><a href="index.php">Home</a></li>
                <li><a href="buku.php">Buku</a></li>
                <li><a href="jenis.php">Jenis Buku</a></li>
                <li><a href="vendor.php">Vendor</a></li>
            </ul>
            <a style="background-color:black;" href="../logout.php"><button type="button" class="btn btn-danger">LogOut</button></a>

        </div>
    </nav>
    <div id="particles-js">
        <div class="heading">
            <h1>SELAMAT DATANG DI LERI'S STATIONARY</h1>
            <?php
            session_start();
            if (!isset($_SESSION['nama'])) {
                header("Location: index.php");
            }
            echo "<h3>Selamat Datang Mahasiswa, " . $_SESSION['nama'] . "!" . "</h3>";
            ?>
        </div>
    </div>

    <!-- Import Particles.js and app.js files -->
    <script src="../particle/particles.js/particles.js">
    </script>
    <script src="../particle/particles.js/demo/js/app.js">
    </script>
</body>

</html>