<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('error')): ?>
    <p><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= base_url('/jenis/store') ?>" method="post" enctype="multipart/form-data">
    <b>Tambah jenis</b>

    <p>nama_jenis
        <input type="text" name="nama_jenis" placeholder="nama_jenis" />

    <p>keterangan
        <input type="text" name="keterangan" placeholder="keterangan" />

    <p>Foto
        <input type="file" name="foto" placeholder="foto" />
    <p>
        <button type="submit">Tambahkan</button>
</form>
<?= $this->endSection(); ?>