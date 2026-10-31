<?php

include_once 'config/database.php';
$suppliers = mysqli_query($koneksi, 'SELECT id,name FROM suppliers ORDER BY name');
if (!$suppliers || mysqli_num_rows($suppliers) === 0) {
    echo '<div class="alert alert-warning">Tambahkan data supplier terlebih dahulu. <a href="?m=suppliers&s=add">Tambah Supplier</a></div>';
    return;
}
?>
<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Tambah Data Sales</div>
        <div class="col-4 mb-3"><a href="?m=sales" class="btn btn-md btn-primary float-end">Kembali</a></div>
        <form action="?m=sales&s=save" method="post">
            <div class="mb-2"><select name="supplier_id" class="form-select" required>
                    <option value="">-- Pilih Supplier --</option>
                    <?php while ($j = mysqli_fetch_assoc($suppliers)) {
                        echo '<option value="' . (int) $j['id'] . '">' . htmlspecialchars($j['name'] ?: ('Supplier #' . $j['id'])) . '</option>';
                    } ?>
                </select></div>
            <div class="mb-2"><input type="number" min="0" step="1" class="form-control" name="total"
                    placeholder="Total (angka rupiah)"></div>
            <div class="mb-2"><input type="reset" class="btn btn-sm btn-danger"><input type="submit"
                    class="btn btn-sm btn-primary" name="save" value="Simpan"></div>
        </form>
    </div>
</div>
