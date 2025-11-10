<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

if ($row['level'] == 1) {
    echo "Anda berhasil login, silahkan menuju ";
    echo "<a href='homeAdmin.html'>Halaman HOME</a>";
} elseif ($row['level'] == 2) {
    echo "Anda berhasil login, silahkan menuju ";
    echo "<a href='homeGuest.html'>Halaman HOME</a>";
} else {
    echo "Anda gagal login, silahkan ";
    echo "<a href='loginForm.html'>Login kembali</a>";
}

mysqli_close($connect);
?>