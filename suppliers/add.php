<div class="card"><div class="card-body row">
    <div class="card-title h3 col-8">Tambah Data Supplier</div>
    <div class="col-4 mb-3"><a href="?m=suppliers" class="btn btn-md btn-primary float-end">Kembali</a></div>
    <form action="?m=suppliers&s=save" method="post">
        <div class="mb-2"><input type="text" class="form-control" name="name" maxlength="50" placeholder="Nama Supplier"></div>
        <div class="mb-2"><textarea class="form-control" name="address" maxlength="255" placeholder="Alamat" rows="3"></textarea></div>
        <div class="mb-2"><input type="text" class="form-control" name="phone" maxlength="50" placeholder="Nomor Telepon"></div>
        <div class="mb-2"><input type="email" class="form-control" name="email" maxlength="50" placeholder="Email"></div>
        <div class="mb-2"><input type="reset" class="btn btn-sm btn-danger">
        <input type="submit" class="btn btn-sm btn-primary" name="save" value="Simpan"></div>
    </form>
</div></div>
