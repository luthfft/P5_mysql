<?php
include '../koneksi.php';

error_reporting(0);

session_start();
if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_form WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($query);

    if ($row['username'] == $username && $row['password'] == $password && $row['role'] == 1) {
        $_SESSION['nama'] = $row['nama'];
        setcookie("sda", $row['username'], time() + 1000);
        header("Location: ../index.php");
    } else if ($row['username'] == $username && $row['password'] == $password && $row['role'] == 2) {
        $_SESSION['nama'] = $row['nama'];
        setcookie("sda", $row['username'], time() + 1000);
        header("Location: ../user/index.php");
    } else {
        echo "<script>
    alert('Username atau Password Salah');window.location.href='./login.php'
</script>";
        $_COOKIE['nama'] = $row['nama'];
    }
}
