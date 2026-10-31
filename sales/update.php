<?php
if (isset($_POST['update'])) {
    include_once 'config/database.php';
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $supplier_id = filter_input(INPUT_POST, 'supplier_id', FILTER_VALIDATE_INT);
    $total_raw = trim($_POST['total'] ?? '');
    if (!$id || $id < 1 || !$supplier_id || $supplier_id < 1 || ($total_raw !== '' && (!ctype_digit($total_raw) || (float) $total_raw > 4294967295))) {
        exit('Data tidak valid. <a href="?m=sales">Kembali</a>');
    }
    if ($total_raw === '') {
        $stmt = mysqli_prepare($koneksi, 'UPDATE sales SET supplier_id=?, total=NULL WHERE id=?');
        mysqli_stmt_bind_param($stmt, 'ii', $supplier_id, $id);
    } else {
        $total = (int) $total_raw;
        $stmt = mysqli_prepare($koneksi, 'UPDATE sales SET supplier_id=?, total=? WHERE id=?');
        mysqli_stmt_bind_param($stmt, 'iii', $supplier_id, $total, $id);
    }
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ?m=sales');
        exit;
    }
    echo 'Error: ' . htmlspecialchars(mysqli_error($koneksi));
} else {
    echo 'Jangan akses langsung file update.php';
}
