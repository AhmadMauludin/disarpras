<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="mb-10">Konfirmasi Peminjaman</h2>

<div class="card-style mb-3">
    <p><b>Nama User:</b> <?= $peminjaman['nama_user'] ?></p>
    <p><b>Sarana:</b> <?= $peminjaman['nama_sarana'] ?></p>
    <p><b>Tanggal Pinjam:</b> <?= $peminjaman['tanggal_pinjam'] ?></p>
    <p><b>Tanggal Kembali:</b> <?= $peminjaman['tanggal_kembali'] ?></p>
</div>

<form action="<?= site_url('peminjaman/update/' . $peminjaman['id_peminjaman']) ?>" method="post">
    <div class="select-style-1">
        <label for="status">Status Peminjaman</label>
        <div class="select-position">
            <select name="status" id="status" required>
                <option value="pending" <?= $peminjaman['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="disetujui" <?= $peminjaman['status'] == 'disetujui' ? 'selected' : '' ?>>Disetujui</option>
                <option value="dipinjam" <?= $peminjaman['status'] == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                <option value="ditolak" <?= $peminjaman['status'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                <option value="dikembalikan" <?= $peminjaman['status'] == 'dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
            </select>
        </div>
    </div>

    <button type="submit" class="main-btn success-btn btn-hover mt-3">
        Simpan Perubahan
    </button>
    <a href="<?= site_url('peminjaman') ?>" class="main-btn danger-btn btn-hover mt-3">
        Batal
    </a>
</form>

<?= $this->endSection(); ?>