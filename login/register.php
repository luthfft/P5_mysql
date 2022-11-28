<?php
include '../koneksi.php';
if (isset($_POST['Register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['usernamesignup'];
    $role = $_POST['role'];
    $password = $_POST['passwordsignup'];
    $cpassword = $_POST['passwordsignup2'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM login_form WHERE username='$username'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO login_form (nama,username, password,role, status)
VALUES ('$nama','$username', '$password','$role', '1')";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>
    alert('Selamat, registrasi berhasil!') </script>";
                echo "<script>window.location.href='./login.php'</script>";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>
    alert('Woops! Terjadi kesalahan.')
</script>";
                echo "<script>window.location.href='./login.php'</script>";
            }
        } else {
            echo "<script>
    alert('Pilih Role dan Username sudah terdaftar')
</script>";
            echo "<script>window.location.href='./login.php'</script>";
        }
    } else {
        echo "<script> alert('Password Tidak Sesuai')</script>";
        echo "<script>window.location.href='./login.php'</script>";
    }
}
