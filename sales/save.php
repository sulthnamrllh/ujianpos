<?php
if (isset($_POST['save'])) {
    include_once 'config/database.php';
    $supplier_id = filter_input(INPUT_POST, 'supplier_id', FILTER_VALIDATE_INT);
    $total_raw = trim($_POST['total'] ?? '');
    if (!$supplier_id || $supplier_id < 1 || ($total_raw !== '' && (!ctype_digit($total_raw) || (float)$total_raw > 4294967295))) {
        exit('Data tidak valid. <a href="?m=sales&s=add">Kembali</a>');
    }
    $cek = mysqli_prepare($koneksi, 'SELECT id FROM suppliers WHERE id=?');
    mysqli_stmt_bind_param($cek, 'i', $supplier_id);
    mysqli_stmt_execute($cek);
    if (!mysqli_stmt_get_result($cek)->fetch_assoc()) { exit('Supplier tidak ditemukan.'); }
    if ($total_raw === '') {
        $stmt = mysqli_prepare($koneksi, 'INSERT INTO sales (supplier_id,total) VALUES (?,NULL)');
        mysqli_stmt_bind_param($stmt, 'i', $supplier_id);
    } else {
        $total = (int)$total_raw;
        $stmt = mysqli_prepare($koneksi, 'INSERT INTO sales (supplier_id,total) VALUES (?,?)');
        mysqli_stmt_bind_param($stmt, 'ii', $supplier_id, $total);
    }
    if (mysqli_stmt_execute($stmt)) { header('Location: ?m=sales'); exit; }
    echo 'Error: ' . htmlspecialchars(mysqli_error($koneksi));
} else { echo 'Jangan akses langsung file save.php'; }
