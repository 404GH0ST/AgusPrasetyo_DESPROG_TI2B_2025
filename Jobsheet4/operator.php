<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Tambah: $hasilTambah <br>";
echo "Hasil Kurang: $hasilKurang <br>";
echo "Hasil Kali: $hasilKali <br>";
echo "Hasil Bagi: $hasilBagi <br>";
echo "Sisa Bagi: $sisaBagi <br>";
echo "Pangkat: $pangkat <br>";
echo "<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil Sama: " . ($hasilSama ? "true" : "false") . " <br>";
echo "Hasil Tidak Sama: " . ($hasilTidakSama ? "true" : "false") . " <br>";
echo "Hasil Lebih Kecil: " . ($hasilLebihKecil ? "true" : "false") . " <br>";
echo "Hasil Lebih Besar: " . ($hasilLebihBesar ? "true" : "false") . " <br>";
echo "Hasil Lebih Kecil Sama: " .
    ($hasilLebihKecilSama ? "true" : "false") .
    " <br>";
echo "Hasil Lebih Besar Sama: " .
    ($hasilLebihBesarSama ? "true" : "false") .
    " <br>";
echo "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil And: " . ($hasilAnd ? "true" : "false") . " <br>";
echo "Hasil Or: " . ($hasilOr ? "true" : "false") . " <br>";
echo "Hasil Not A: " . ($hasilNotA ? "true" : "false") . " <br>";
echo "Hasil Not B: " . ($hasilNotB ? "true" : "false") . " <br>";
echo "<br>";

$a += $b;
echo "Setelah ditambah b: $a <br>";
$a -= $b;
echo "Setelah dikurang b: $a <br>";
$a *= $b;
echo "Setelah dikali b: $a <br>";
$a /= $b;
echo "Setelah dibagi b: $a <br>";
$a %= $b;
echo "Setelah modulus b: $a <br>";
echo "<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Identik: " . ($hasilIdentik ? "true" : "false") . " <br>";
echo "Hasil Tidak Identik: " .
    ($hasilTidakIdentik ? "true" : "false") .
    " <br>";
echo "<br>";

// Soal cerita
$totalKursi = 45;
$kursiTerisi = 28;
$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

echo "Jumlah kursi kosong: $kursiKosong <br>";
echo "Persentase kursi kosong: $persentaseKosong % <br>";

?>
