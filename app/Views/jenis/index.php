<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 col-md-5 col-12">
    <h2 class="mb-10">Data Jenis
        <?php if (session()->get('role') === 'admin'): ?>
            <a href="<?= site_url('jenis/create') ?>" class="main-btn primary-btn btn-hover btn-sm">
                <i class="lni lni-plus mr-5"></i>Tambah
            </a>
        <?php endif; ?>
    </h2>
    <div class="input-style-1">
        <form action="<?= base_url('jenis') ?>" method="GET">
            <input type="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>" placeholder="Search...">
        </form>
    </div>
</div>

<div class="table-wrapper table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h6>#</h6>
                </th>
                <th>
                    <h6>Foto</h6>
                </th>
                <th>
                    <h6>Nama Jenis</h6>
                </th>
                <th>
                    <h6>Keterangan</h6>
                </th>
                <th>
                    <h6>Aksi</h6>
                </th>
            </tr>
        </thead>
        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>
        <?php foreach ($jenis as $row): ?>
            <tbody>
                <tr>
                    <td>
                        <p><?= $no ?></p>
                    </td>
                    <td>
                        <?php if (!empty($row['foto'])): ?>
                            <img src="<?= base_url('uploads/jenis/' . $row['foto']) ?>" height="50" />
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p><?= $row['nama_jenis'] ?></p>
                    </td>
                    <td>
                        <p><?= $row['keterangan'] ?></p>
                    </td>
                    <td>
                        <div class="action">
                            <?php if (session()->get('role') === 'admin'): ?>
                                <a class="text-success" href="<?= site_url('jenis/edit/' . $row['id_jenis']) ?>">
                                    <i class="lni lni-pencil"></i>
                                </a>
                                &nbsp;
                                <a class="text-danger" href="<?= site_url('jenis/delete/' . $row['id_jenis']) ?>" onclick="return confirm('Hapus data?')">
                                    <i class="lni lni-trash-can"></i>
                                </a>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        <?php $no++;
        endforeach; ?>
    </table>
</div>

<?= $this->endSection(); ?>