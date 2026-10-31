<?php
include_once 'config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id && $id > 0) {
    $stmt = mysqli_prepare($koneksi, 'DELETE FROM sales WHERE id=?');
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
}
header('Location: ?m=sales'); exit;
