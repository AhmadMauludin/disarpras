<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<H2> Dashboard </H2>
<p>Selamat datang, <b><?= session('nama'); ?>!</b></p>
<hr>

<?php if (session()->get('role') === 'admin' || session()->get('role') === 'kepsek'): ?>
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon purple">
                    <i class="lni lni-grid-alt"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Total Sarana</h6>
                    <h3 class="text-bold mb-10"><?= $totalSarana ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon main">
                    <i class="lni lni-circle-plus"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Peminjaman</h6>
                    <h3 class="text-bold mb-10"><?= $totalAll ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon orange">
                    <i class="lni lni-hourglass"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Pending</h6>
                    <h3 class="text-bold mb-10"><?= $totalPending ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon success">
                    <i class="lni lni-checkmark"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Disetujui</h6>
                    <h3 class="text-bold mb-10"><?= $totalSetujui ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon gray">
                    <i class="lni lni-briefcase"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Dipinjam</h6>
                    <h3 class="text-bold mb-10"><?= $totalDipinjam ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon orange">
                    <i class="lni lni-ban"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Ditolak</h6>
                    <h3 class="text-bold mb-10"><?= $totalTolak ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
                <div class="icon success">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="content">
                    <h6 class="mb-10">Dikembalikan</h6>
                    <h3 class="text-bold mb-10"><?= $totalKembali ?></h3>
                </div>
            </div>
            <!-- End Icon Cart -->
        </div>
        <!-- End Col -->
    </div>

<?php else: ?>
    <h6>Notifikasi Peminjaman</h6>
    <?php if (!empty($notifikasi)): ?>
        <ul>
            <?php foreach ($notifikasi as $n): ?>
                <li><?= $n ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ada peminjaman aktif.</p>
    <?php endif; ?>
<?php endif; ?>

<?= $this->endSection(); ?>