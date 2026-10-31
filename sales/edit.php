<?php
include_once 'config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    echo 'ID sales tidak valid.';
    return;
}
$stmt = mysqli_prepare($koneksi, 'SELECT * FROM sales WHERE id=?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$r = mysqli_stmt_get_result($stmt)->fetch_assoc();
if (!$r) {
    echo 'Data sales tidak ditemukan.';
    return;
}
$suppliers = mysqli_query($koneksi, 'SELECT id,name FROM suppliers ORDER BY name');
?>
<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Edit Data Sales</div>
        <div class="col-4 mb-3"><a href="?m=sales" class="btn btn-md btn-primary float-end">Kembali</a></div>
        <form action="?m=sales&s=update" method="post">
            <div class="mb-2"><select name="supplier_id" class="form-select" required>
                    <option value="">-- Pilih Supplier --</option>
                    <?php while ($j = mysqli_fetch_assoc($suppliers)) {
                        $selected = ((int) $j['id'] === (int) $r['supplier_id']) ? 'selected' : '';
                        echo '<option value="' . (int) $j['id'] . '" ' . $selected . '>' . htmlspecialchars($j['name'] ?: ('Supplier #' . $j['id'])) . '</option>';
                    } ?>
                </select></div>
            <div class="mb-2"><input type="number" min="0" step="1" class="form-control" name="total"
                    value="<?= htmlspecialchars((string) ($r['total'] ?? '')) ?>" placeholder="Total (angka rupiah)">
            </div>
            <div class="mb-2"><input type="hidden" name="id" value="<?= (int) $r['id'] ?>"><input type="reset"
                    class="btn btn-sm btn-danger"><input type="submit" class="btn btn-sm btn-primary" name="update"
                    value="Update"></div>
        </form>
    </div>
</div>
