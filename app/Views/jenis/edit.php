<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<img src="<?= base_url('uploads/jenis/' . $jenis['foto']) ?>" width="50" />
<br>

<form action="<?= base_url('/jenis/update/' . $jenis['id_jenis']) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_foto" value="<?= $jenis['foto'] ?>">

    <p>nama_jenis <input name="nama_jenis" type="text" value="<?= $jenis['nama_jenis'] ?>" />

    <p>keterangan <input name="keterangan" type="text" value="<?= $jenis['keterangan'] ?>" />

    <p>Foto <input name="foto" type="file" />

    <p><a href="<?= base_url('/jenis'); ?>">Kembali</a>
        <button type="submit">Ubah jenis</button>
</form>

<?= $this->endSection(); ?>