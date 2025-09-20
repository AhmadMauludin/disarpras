<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<b>Data jenis</b> <a href="<?= site_url('jenis/create') ?>">Tambah +</a>
<form action="<?= base_url('jenis') ?>" method="GET">
    <input type="text" name="keyword" value="<?= esc($_GET['keyword'] ?? '') ?>" placeholder="Search...">
</form>
<hr>
<table>
    <thead>
        <tr>
            <th> # </th>
            <th> Foto </th>
            <th> Nama Jenis</th>
            <th> Keterangan </th>
            <th> Aksi</th>
        </tr>
    </thead>
    <?php $no = 1 + (5 * ($pager->getCurrentPage() - 1)); ?>
    <?php foreach ($jenis as $row): ?>
        <tbody>
            <tr>
                <td> <?= $no ?> </td>
                <td> <img src="<?= base_url('uploads/jenis/' . $row['foto']) ?>" height="50" /> </td>
                <td> <?= $row['nama_jenis'] ?> </td>
                <td> <?= $row['keterangan'] ?> </td>
                <td>
                    <a href="<?= site_url('jenis/delete/' . $row['id_jenis']) ?>" onclick="return confirm('Hapus data?')">Hapus</a> |
                    <a href="<?= site_url('jenis/edit/' . $row['id_jenis']) ?>"> Edit </a>
                </td>
            </tr>
        </tbody>
    <?php $no++;
    endforeach; ?>
</table>

<?= $this->endSection(); ?>