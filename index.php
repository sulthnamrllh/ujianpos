<?php
// Router utama mengikuti pola file contoh: ?m=nama_modul&s=aksi
$module = isset($_GET['m']) ? $_GET['m'] : 'home';
$submodule = isset($_GET['s']) ? $_GET['s'] : 'tampil';

// Proses simpan/update/hapus sebelum HTML dicetak agar header() dapat redirect.
$actions = ['save' => 'save.php', 'update' => 'update.php', 'delete' => 'delete.php'];
if (in_array($module, ['suppliers', 'sales'], true) && isset($actions[$submodule])) {
    include __DIR__ . '/' . $module . '/' . $actions[$submodule];
    exit;
}

include 'includes/header.php';
switch ($module) {
    case 'home':
    default:
        include 'home.php';
        break;
    case 'suppliers':
        switch ($submodule) {
            case 'add':
                include 'suppliers/add.php';
                break;
            case 'edit':
                include 'suppliers/edit.php';
                break;
            case 'tampil':
            default:
                include 'suppliers/index.php';
                break;
        }
        break;
    case 'sales':
        switch ($submodule) {
            case 'add':
                include 'sales/add.php';
                break;
            case 'edit':
                include 'sales/edit.php';
                break;
            case 'tampil':
            default:
                include 'sales/index.php';
                break;
        }
        break;
}
include 'includes/footer.php';
