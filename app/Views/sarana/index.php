<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 col-md-5 col-12">
    <h2 class="mb-10">Data Sarana
        <?php if (session()->get('role') === 'admin'): ?>
            <a href="<?= site_url('sarana/create') ?>" class="main-btn primary-btn btn-hover btn-sm">
                <i class="lni lni-plus mr-5"></i>Tambah</a>
        <?php endif; ?>
    </h2>
    <div class="input-style-1">
        <form action="<?= base_url('sarana') ?>" method="GET">
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
                    <h6>Kode Sarana</h6>
                </th>
                <th>
                    <h6>Jenis</h6>
                </th>
                <th>
                    <h6>Nama Sarana</h6>
                </th>
                <th>
                    <h6>Kondisi</h6>
                </th>
                <th>
                    <h6>Lokasi</h6>
                </th>
                <th>
                    <h6>Aksi</h6>
                </th>
            </tr>
        </thead>
        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>
        <?php foreach ($sarana as $row): ?>
            <tbody>
                <tr>
                    <td>
                        <p><?= $no ?></p>
                    </td>
                    <td>
                        <p><?= $row['kode_sarana'] ?></p>
                    </td>
                    <td>
                        <p><?= $row['nama_jenis'] ?></p><!-- tampilkan nama_jenis -->
                    </td>
                    <td>
                        <p><?= $row['nama_sarana'] ?></p>
                    </td>
                    <td>
                        <p><?= $row['kondisi'] ?></p>
                    </td>
                    <td>
                        <p><?= $row['lokasi'] ?></p>
                    </td>
                    <td>
                        <div class=" action">
                            <a class="text-primary" href="<?= site_url('sarana/detail/' . $row['id_sarana']) ?>">
                                <i class="lni lni-eye"></i>&nbsp;
                            </a>
                            <?php if (session()->get('role') === 'admin'): ?>
                                <a class="text-success" href="<?= site_url('sarana/edit/' . $row['id_sarana']) ?>">
                                    <i class="lni lni-pencil"></i>
                                </a>
                                &nbsp;
                                <a class="text-danger" href="<?= site_url('sarana/delete/' . $row['id_sarana']) ?>" onclick="return confirm('Hapus data?')">
                                    <i class="lni lni-trash-can"></i>
                                </a>
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