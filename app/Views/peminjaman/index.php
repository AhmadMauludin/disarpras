<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<h2 class="mb-10">Data Peminjaman </h2>

<?php if (!in_array(session()->get('role'), ['admin', 'kepsek'])): ?>
    <a href="<?= site_url('peminjaman/create') ?>" class="main-btn primary-btn btn-sm mb-3">
        <i class="lni lni-plus"></i> Tambah Peminjaman
    </a>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="input-style-1">
    <form method="get" action="<?= base_url('peminjaman'); ?>">
        <input type="text" name="keyword" value="<?= esc($keyword) ?>" placeholder="Search">
    </form>
</div>

<div class="table-wrapper table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama User</th>
                <th>Sarana</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($peminjaman as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_user'] ?></td>
                    <td><?= $row['nama_sarana'] ?></td>
                    <td><?= $row['tanggal_pinjam'] ?></td>
                    <td><?= $row['tanggal_kembali'] ?></td>
                    <td><span class="badge bg-info"><?= $row['status'] ?></span></td>
                    <td>
                        <?php if (in_array(session()->get('role'), ['admin'])): ?>
                            <a class="main-btn info-btn btn-sm" href="<?= site_url('peminjaman/edit/' . $row['id_peminjaman']) ?>"><i class="lni lni-pencil"></i>
                            </a>
                            <?php if ($row['status'] === 'cancel'): ?>
                                <a href="<?= base_url('/peminjaman/delete/' . $row['id_peminjaman']) ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="main-btn danger-btn btn-sm"> <i class="lni lni-trash-can"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($row['status'] === 'disetujui'): ?>
                            <a class="main-btn success-btn btn-sm" href="<?= site_url('peminjaman/cetak/' . $row['id_peminjaman']) ?>" target="_blank">
                                <i class="lni lni-printer"></i>
                            </a>
                        <?php endif; ?>

                        <?php if (session()->get('role') === 'siswa' || session()->get('role') === 'guru'): ?>
                            <?php if ($row['status'] === 'pending'): ?>
                                <a class="main-btn danger-btn btn-sm" href="<?= base_url('/peminjaman/cancel/' . $row['id_peminjaman']) ?>"
                                    onclick="return confirm('Yakin ingin membatalkan peminjaman ini?')"
                                    class="btn btn-warning"><i class="lni lni-close"></i></a>
                            <?php endif; ?>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->endSection(); ?>