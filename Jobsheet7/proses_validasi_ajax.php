<?php

$nama = $_POST["nama"] ?? '';
$email = $_POST["email"] ?? '';
$nama_error = '';
$email_error = '';
$message = '';


if (empty($nama)) {
    $nama_error = "Nama harus diisi.";
}

if (empty($email)) {
    $email_error = "Email harus diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Format email tidak valid.";
}

if (empty($nama_error) && empty($email_error)) {
    $message = "Data berhasil dikirim: Nama = $nama, Email = $email";
} else {
    $message = "Validasi gagal.";
}

echo "$nama_error|$email_error|$message";
?>