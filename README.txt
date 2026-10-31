UJIANPOS - STRUKTUR MENGIKUTI CONTOH APLIKASI NILAI

Aplikasi ini menggunakan pola:
- index.php sebagai halaman utama sekaligus router (?m=suppliers / ?m=sales).
- index.php di dalam folder suppliers dan sales sebagai halaman daftar/read.
- add.php, save.php, edit.php, update.php, delete.php tetap memakai nama file semula.
- Koneksi MySQL menggunakan mysqli melalui config/database.php.

INSTALASI:
1. Letakkan folder ujianpos di htdocs (XAMPP) atau /var/www/html (Linux).
2. Jalankan Apache dan MySQL.
3. Import database.sql melalui phpMyAdmin.
4. Sesuaikan username/password pada config/database.php.
5. Buka http://localhost/ujianpos/

CATATAN:
- Buat supplier terlebih dahulu sebelum membuat data sales.
- Menghapus supplier menghapus sales terkait karena ON DELETE CASCADE.
- Form sales menerima total angka bulat dan boleh dikosongkan.
- Struktur dan nama file CRUD dipertahankan, kode disesuaikan dengan pola router pada file contoh.
