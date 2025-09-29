<?php
$pesan = "saya arek malang";
$pesanPerKata = explode(" ", $pesan);
$pesanPerKata = array_map(fn($kata) => strrev($kata), $pesanPerKata);
$pesan = implode(" ", $pesanPerKata);

echo $pesan . "<br>";
?>