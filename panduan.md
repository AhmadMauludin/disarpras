Instalasi CodeIgniter 4
1. Download package CI4, lalu ekstrak
2. Rename nama folder root aplikasinya dengan nama sendiri (satu kata tanpa spasi).
3. Pindahkan ke folder htdocs
4. Konfigurasikan agar CI agar dapat berjalan di server xampp
5. Pindahkan seluruh file dalam folder public ke luar (ke folder root aplikasi)
6. Buka file index.php, hilangkan ../ pada bagian  require FCPATH
7. Konfigurasi file app/Config/App.php, edit Base URl menjadi localhost/namafolderroot
8. Konfigurasi file app/Config/Paths.php, tambahkan $publicDirectory = _DIR_ . '/../'; di akhir sebelum tutup kurawal } 
9. Buat database baru (namanya samakan dengan nama folder root aplikasinya)

Konfigurasikan file env
1. rename file env menjadi .env
2. aktifkan dan ubah # CI_ENVIRONMRNT = production menjadi CI_ENVIRONMENT = development
3. aktifkan semua bagian database.default
4. database.default.database = CI4 ubah menjadi database.default.database = namadatabase
5. buang root pada bagian database.default.password

Templating layouts
1. Download assets.zip, ekstrak lalu simpan di dalam folder root aplikasi
2. Buat folder baru bernama layouts di dalam folder Views
3. Buat file baru di folder layouts bernama main.php
4. Buat file baru di folder layouts bernama menu.php 
5. Buat file baru di folder layouts bernama dashboard.php 
6. Buat controller baru bernama Home
7. Tambahkan routes
8. Pisahkan menu (listnya saja) dari main.php → Buat menu.php → panggil di main.php

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

Halaman CRUD / Kelola Data Users
1. Dalam folder views buat folder Users
2. Dalam root folder buat folder uploads
3. Dalam folder uploads buat folder users
4. Buat Model
5. Buat Controller
6. Buat View
