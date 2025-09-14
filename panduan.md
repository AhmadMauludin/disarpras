Instalasi CodeIgniter 4

1. Download package CI4, lalu ekstrak
2. Rename nama folder root aplikasinya dengan nama sendiri (satu kata tanpa spasi).
3. Pindahkan ke folder htdocs
4. Konfigurasikan agar CI agar dapat berjalan di server xampp
5. Pindahkan seluruh file dalam folder public ke luar (ke folder root aplikasi)
6. Buka file index.php, hilangkan ../ pada bagian require FCPATH
7. Konfigurasi file app/Config/App.php, edit Base URl menjadi localhost/namafolderroot
8. Konfigurasi file app/Config/Paths.php, tambahkan $publicDirectory = _DIR_ . '/../'; di akhir sebelum tutup kurawal }
9. Buat database baru (namanya samakan dengan nama folder root aplikasinya)

Konfigurasikan file env

1. rename file env menjadi .env
2. aktifkan dan ubah # CI_ENVIRONMRNT = production menjadi CI_ENVIRONMENT = development
3. aktifkan semua bagian database.default
4. database.default.database = CI4 ubah menjadi database.default.database = namadatabase
5. buang root pada bagian database.default.password

Templating layouts (Ket : -ISC = Isikan Sesuai Contoh, yang diberikan pada repository github)

1. Download assets.zip, ekstrak lalu simpan di dalam folder rootaplikasi/assets
2. Buat folder baru bernama layouts di dalam folder Views
3. Buat file baru di folder layouts bernama main.php → isikan dengan isian template bootstrap (halaman blank.html atau index.html) lalu sesuaikan isinya dengan menghapus bagian yang tidak diperlukan
4. Sesuaikan semua kode pemanggilan assets, misalkan `<link rel="stylesheet" href="assets/css/main.css" />` modifikasi menjadi `<link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />` lakukan pada semua.
5. Buat controller baru bernama Home.php -ISC
6. Tambahkan routes baru pada file App/Config/Routes.php -ISC
7. Pada folder layouts Buat file menu.php
8. Pisahkan menu (listnya saja) dari main.php → masukan ke menu.php
9. Pada main.php tambahkan `<?= view('layouts/menu') ?>` pada bagian dimana sebelumnya list menu dipindahkan ke menu.php
10. Pada main.php ganti tulisan `<div class="left"> <h6 class="text-medium mb-10">Yearly Stats</h6> </div>` dengan `<?= $this->renderSection('content'); ?>` yang berfungsi untuk memanggil konten atau halaman yang akan ditampilkan
11. Pada folder layouts buat file dashboard.php -ISC
12. Buka App/Controllers/Home.php ubah `return view('layouts/main');` menjadi `return view('layouts/dashboard');`

Autentikasi (Login Users)

1. Buat tabel users (id_user, nama, username, role, password, foto, creater_at) → password di hash
2. Buat file UsersModel.php di 📁 model
3. Buat file Auth.php di 📁 controller
4. Buat file login.php di 📁 Views/auth → copy dari template & sesuaikan dengan kebutuhan → sesuiakan action form & method
5. Buat file AuthFilter.php (sebagai midleware/filter) & RoleFilter.php di 📂 app/Filters
6. Tambahkan kode di bawah pada file App/Config/Filters.php
   'auth' => \App\Filters\AuthFilter::class,
   'role' => App\Filters\RoleFilter::class,
7. Tambahkan rute login, proseslogin & logout di App/Config/Routes.php
8. Buat Filter Hak Akses & Terapkan di Routes.php
9. Tambahkan tombol logout di menu / main
10. Tambahkan data baru di database dengan data : id_user : 1, nama : admin, username : admin, role : admin, foto : admin.jpg, password isikan dulu dengan `$2y$10$FMQRdH0ecCbZZVWtN2n7/u1YZN/gr7X98Er4NG4sqDAWCXlZwmB6S` created_at dikosongkan.

Ujicoba halaman login dengan 3 cara

1. Isikan username acak di kolom username selain admin, password isikan 123, berhasil jika muncul tulisan "Nama tidak ditemukan"
2. Isikan username admin di kolom username, password isikan acak selain 123, berhasil jika muncul tulisan "Password salah"
3. Isikan username : admin dan password : 123, berhasil jika halaman berpindah ke halaman utama (main)

Halaman CRUD / Kelola Data Users

1. Dalam folder views buat folder Users
2. Dalam root folder buat folder uploads
3. Dalam folder uploads buat folder users
4. Buat Model
5. Buat Controller
6. Buat View
