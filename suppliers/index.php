<div class="card">
    <div class="card-body row">
        <div class="card-title h3 col-8">Data Suppliers</div>
        <div class="col-4 mb-2">
            <a href="?m=suppliers&s=add" class="btn btn-md btn-primary float-end">Tambah</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'config/database.php';
                    $sql = "SELECT * FROM suppliers ORDER BY id DESC";
                    $result = mysqli_query($koneksi, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($r = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . htmlspecialchars($r['name'] ?? '') . '</td>
                        <td>' . htmlspecialchars($r['address'] ?? '') . '</td>
                        <td>' . htmlspecialchars($r['phone'] ?? '') . '</td>
                        <td>' . htmlspecialchars($r['email'] ?? '') . '</td>
                        <td class="text-nowrap">
                            <a href="?m=suppliers&s=edit&id=' . $r['id'] . '" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?m=suppliers&s=delete&id=' . $r['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus supplier ini? Data sales terkait juga akan terhapus.\')">Hapus</a>
                        </td></tr>';
                            $no++;
                        }
                    } else {
                        echo '<tr><td colspan="6" class="text-center">Data Kosong</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>