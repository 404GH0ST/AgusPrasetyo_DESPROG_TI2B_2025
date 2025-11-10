<?php
$servername = "db";
$username = "root";
$password = "root_password";
$dbname = "prakwebdb";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>