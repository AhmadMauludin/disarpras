<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="mb-10">Ajuan Peminjaman</h2>

<form action="<?= site_url('peminjaman/store') ?>" method="post">
    <div class="card-style mb-30">

        <div class="select-style-1">
            <label for="id_sarana">Pilih Sarana</label>
            <div class="select-position">
                <select name="id_sarana" id="id_sarana" required>
                    <option value="">Pilih Sarana</option>
                    <?php foreach ($sarana as $s): ?>
                        <option value="<?= $s['id_sarana'] ?>"><?= $s['nama_sarana'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="input-style-1">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required>
        </div>

        <div class="input-style-1">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" required>
        </div>

        <button type="submit" class="main-btn primary-btn btn-hover mt-3">
            Ajukan Peminjaman
        </button>
    </div>
</form>

<?= $this->endSection(); ?>