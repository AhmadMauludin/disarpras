<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-8 col-md-10 col-12">
    <h2 class="mb-10">Edit Jenis</h2>

    <form action="<?= base_url('/jenis/update/' . $jenis['id_jenis']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $jenis['foto'] ?>">

        <div class="mb-3">
            <label class="mb-2">Foto Saat Ini</label><br>
            <img src="<?= base_url('uploads/jenis/' . $jenis['foto']) ?>" width="80" class="mb-3 rounded">
        </div>

        <div class="input-style-1">
            <label for="nama_jenis">Nama Jenis</label>
            <input name="nama_jenis" id="nama_jenis" type="text" value="<?= $jenis['nama_jenis'] ?>" required>
        </div>

        <div class="input-style-1">
            <label for="keterangan">Keterangan</label>
            <input name="keterangan" id="keterangan" type="text" value="<?= $jenis['keterangan'] ?>">
        </div>

        <div class="input-style-1">
            <label for="foto">Foto Baru (opsional)</label>
            <input name="foto" id="foto" type="file" accept="image/*">
        </div>

        <div class="button-group mt-3">
            <button type="submit" class="main-btn success-btn btn-hover">
                <i class="lni lni-checkmark"></i> Simpan Perubahan
            </button>
            <a href="<?= base_url('/jenis'); ?>" class="main-btn danger-btn btn-hover">
                <i class="lni lni-close"></i> Batal
            </a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>