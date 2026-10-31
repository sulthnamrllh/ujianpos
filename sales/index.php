<div class="card"><div class="card-body row">
    <div class="card-title h3 col-8">Data Sales</div>
    <div class="col-4 mb-2"><a href="?m=sales&s=add" class="btn btn-md btn-primary float-end">Tambah</a></div>
    <div class="table-responsive"><table class="table table-striped table-bordered table-hover">
        <thead><tr><th>No</th><th>Supplier</th><th>Total</th><th>Aksi</th></tr></thead><tbody>
        <?php
        include_once 'config/database.php';
        $sql = 'SELECT sales.*, suppliers.name AS supplier_name FROM sales INNER JOIN suppliers ON sales.supplier_id=suppliers.id ORDER BY sales.id DESC';
        $result = mysqli_query($koneksi, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $no=1;
            while ($r=mysqli_fetch_assoc($result)) {
                $total = $r['total'] === null ? '-' : 'Rp ' . number_format((int)$r['total'],0,',','.');
                echo '<tr><td>'.$no.'</td><td>'.htmlspecialchars($r['supplier_name'] ?? '').'</td><td>'.$total.'</td>
                    <td class="text-nowrap"><a href="?m=sales&s=edit&id='.$r['id'].'" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?m=sales&s=delete&id='.$r['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin?\')">Hapus</a></td></tr>';
                $no++;
            }
        } else { echo '<tr><td colspan="4" class="text-center">Data Kosong</td></tr>'; }
        ?>
        </tbody></table></div>
</div></div>
