Instalasi CodeIgniter 4
Download package CI4, lalu ekstrak
Rename nama folder root aplikasinya dengan nama sendiri (satu kata tanpa spasi).
Pindahkan ke folder htdocs
Konfigurasikan agar CI agar dapat berjalan di server xampp
Pindahkan seluruh file dalam folder public ke luar (ke folder root aplikasi)
Buka file index.php, hilangkan ../ pada bagian  require FCPATH
Konfigurasi file app/Config/App.php, edit Base URl menjadi localhost/namafolderroot
Konfigurasi file app/Config/Paths.php, tambahkan $publicDirectory = _DIR_ . '/../'; di akhir sebelum tutup kurawal } 
Buat database baru (namanya samakan dengan nama folder root aplikasinya)
Konfigurasikan file env
rename file env menjadi .env
aktifkan dan ubah # CI_ENVIRONMRNT = production menjadi CI_ENVIRONMENT = development
aktifkan semua bagian database.default
database.default.database = CI4 ubah menjadi database.default.database = namadatabase
buang root pada bagian database.default.password
Templating layouts
Download assets.zip, ekstrak lalu simpan di dalam folder root aplikasi
Buat folder baru bernama layouts di dalam folder Views
Buat file baru di folder layouts bernama main.php
Buat file baru di folder layouts bernama menu.php 
Buat file baru di folder layouts bernama dashboard.php 
Buat controller baru bernama Home
Tambahkan routes

Pisahkan menu (listnya saja) dari main.php → Buat menu.php → panggil di main.php

Autentikasi (Login Users)
Buat tabel users (id_user, nama, username, role, password, foto) → password di hash
Buat file Users.php di 📁 model
Buat file Auth.php di 📁 controller
Buat file login.php di 📁 Views/auth → copy dari template & sesuaikan dengan kebutuhan → sesuiakan action form & method
Buat file AuthFilter.php (sebagai midleware/filter) & RoleFilter.php di 📂 app/Filters
Tambahkan kode di bawah pada file App/Config/Filters.php
'auth' => \App\Filters\AuthFilter::class,
'role' => App\Filters\RoleFilter::class,
Tambahkan rute login, proseslogin & logout di App/Config/Routes.php
Buat Filter Hak Akses & Terapkan di Routes.php
Tambahkan tombol logout di menu / main

Halaman CRUD / Kelola Data Users
Dalam folder views buat folder Users
Dalam root folder buat folder uploads
Dalam folder uploads buat folder users
Buat Model
Buat Controller
Buat View
