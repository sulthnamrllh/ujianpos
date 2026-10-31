<?php
if (isset($_POST['save'])) {
    include_once 'config/database.php';
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if (
        strlen($name) > 50 || strlen($address) > 255 || strlen($phone) > 50 || strlen($email) > 50 ||
        ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL))
    ) {
        exit('Data tidak valid. <a href="?m=suppliers&s=add">Kembali</a>');
    }
    $stmt = mysqli_prepare($koneksi, 'INSERT INTO suppliers (name,address,phone,email) VALUES (?,?,?,?)');
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $address, $phone, $email);
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ?m=suppliers');
        exit;
    }
    echo 'Error: ' . htmlspecialchars(mysqli_error($koneksi));
} else {
    echo 'Jangan akses langsung file save.php';
}
