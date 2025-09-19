<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 col-md-5 col-12">
    <h2 class="mb-10">Data Users</h2>
    <div class="input-style-1">
        <form action="<?= base_url('users') ?>" method="GET">
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
                    <h6>Nama</h6>
                </th>
                <th>
                    <h6>Username</h6>
                </th>
                <th>
                    <h6>Role</h6>
                </th>
                <th>
                    <h6>Aksi</h6>
                </th>
            </tr>
            <!-- end table row-->
        </thead>
        <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>
        <?php foreach ($users as $row): ?>
            <tbody>
                <tr>
                    <td class="min-width">
                        <p><?= $no ?></p>
                    </td>
                    <td>
                        <div class="employee-image">
                            <img src="<?= base_url('uploads/users/' . $row['foto']) ?>" />
                        </div>
                    </td>
                    <td class="min-width">
                        <p><?= $row['nama'] ?></p>
                    </td>
                    <td class="min-width">
                        <p><?= $row['username'] ?></p>
                    </td>
                    <td class="min-width">
                        <span class="status-btn active-btn"><?= $row['role'] ?></span>
                    </td>
                    <td>
                        <div class="action">
                            <a class="text-danger" href="<?= site_url('users/delete/' . $row['id_user']) ?>" onclick="return confirm('Hapus data?')"><i class="lni lni-trash-can"></i></a>
                        </div>
                    </td>
                </tr>

            </tbody>
        <?php $no++;
        endforeach; ?>
    </table>
    <!-- end table -->
</div>

<?= $this->endSection(); ?>