<?php
// Samakan dengan pola koneksi pada file contoh (mysqli).
$koneksi = mysqli_connect('localhost', 'root', 'tkjtkj', 'ujianpos');
if (!$koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}
mysqli_set_charset($koneksi, 'utf8mb4');
