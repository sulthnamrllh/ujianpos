<?php
if (isset($_POST['update'])) {
    include_once 'config/database.php';
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if (
        !$id || $id < 1 || strlen($name) > 50 || strlen($address) > 255 || strlen($phone) > 50 || strlen($email) > 50 ||
        ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        exit('Data tidak valid. <a href="?m=suppliers">Kembali</a>');
    }
    $stmt = mysqli_prepare($koneksi, 'UPDATE suppliers SET name=?, address=?, phone=?, email=? WHERE id=?');
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $address, $phone, $email, $id);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ?m=suppliers');
        exit;
    }
    echo 'Error: ' . htmlspecialchars(mysqli_error($koneksi));
} else {
    echo 'Jangan akses langsung file update.php';
}
