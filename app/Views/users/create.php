<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Daftar Disarpras</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lineicons.css" rel="stylesheet" type="text/css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" />
</head>

<body>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/users/store') ?>" method="post" enctype="multipart/form-data">
        <div class="card-style mb-30">
            <h6 class="mb-25">Tambah Users</h6>
            <div class="input-style-1">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="nama" />
            </div>
            <div class="input-style-1">
                <label>Username</label>
                <input type="text" name="username" placeholder="username" />
            </div>
            <div class="input-style-1">
                <label>Password</label>
                <input type="text" name="password" placeholder="password" />
            </div>
            <div class="select-style-1">
                <label>Role</label>
                <div class="select-position">
                    <select name="role">
                        <option value="">Pilih Role</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>
            </div>
            <div class="input-style-1">
                <label>Foto</label>
                <input type="file" name="foto" placeholder="foto" />
            </div>

            <div class="button-group d-flex justify-content-center flex-wrap">
                <button class="main-btn primary-btn btn-hover w-100 text-center">
                    Tambahkan
                </button>
            </div>
            <br>
            <center>Sudah punya akun? <a href="<?= site_url('/') ?>">Login di sini</a></center>
            <!-- end input -->
        </div>
    </form>

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dynamic-pie-chart.js'); ?>"></script>
    <script src="<?= base_url('assets/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fullcalendar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jvectormap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/world-merc.js'); ?>"></script>
    <script src="<?= base_url('assets/js/polyfill.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>