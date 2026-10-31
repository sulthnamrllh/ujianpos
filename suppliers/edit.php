<?php
include_once 'config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    echo 'ID supplier tidak valid.';
    return;
}
$stmt = mysqli_prepare($koneksi, 'SELECT * FROM suppliers WHERE id=?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$r = mysqli_fetch_assoc($result);
if (!$r) {
    echo 'Data supplier tidak ditemukan.';
    return;
}
?>
<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Edit Data Supplier</div>
        <div class="col-4 mb-3"><a href="?m=suppliers" class="btn btn-md btn-primary float-end">Kembali</a></div>
        <form action="?m=suppliers&s=update" method="post">

            <div class="mb-2"><input type="text" class="form-control" name="name" maxlength="50"
                    value="<?= htmlspecialchars($r['name'] ?? '') ?>" placeholder="Nama Supplier">
                </div>

            <div class="mb-2"><textarea class="form-control" name="address" maxlength="255" placeholder="Alamat"
                    rows="3"><?= htmlspecialchars($r['address'] ?? '') ?></textarea>
                </div>

            <div class="mb-2"><input type="text" class="form-control" name="phone" maxlength="50"
                    value="<?= htmlspecialchars($r['phone'] ?? '') ?>" placeholder="Nomor Telepon">
                </div>

            <div class="mb-2"><input type="email" class="form-control" name="email" maxlength="50"
                    value="<?= htmlspecialchars($r['email'] ?? '') ?>" placeholder="Email">
                </div>
                
            <div class="mb-2"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>">
                <input type="reset" class="btn btn-sm btn-danger"><input type="submit" class="btn btn-sm btn-primary"
                    name="update" value="Update">
            </div>
        </form>
    </div>
</div>