<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<H2> Ini adalah halaman dashboard </H2>
<p>Selamat datang, <b><?= session('nama'); ?>!</b></p>
<?= $this->endSection(); ?>