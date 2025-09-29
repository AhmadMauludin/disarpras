<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-8 col-md-10 col-12">
    <h2 class="mb-10">Tambah Jenis</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-box danger-alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/jenis/store') ?>" method="post" enctype="multipart/form-data">

        <div class="input-style-1">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" name="nama_jenis" id="nama_jenis" placeholder="Masukkan nama jenis" required>
        </div>

        <div class="input-style-1">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan keterangan">
        </div>

        <div class="input-style-1">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*">
        </div>

        <div class="button-group mt-3">
            <button type="submit" class="main-btn primary-btn btn-hover">
                <i class="lni lni-plus"></i> Tambahkan
            </button>
            <a href="<?= site_url('jenis') ?>" class="main-btn danger-btn btn-hover">
                <i class="lni lni-close"></i> Batal
            </a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>