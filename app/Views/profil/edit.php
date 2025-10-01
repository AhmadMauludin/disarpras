<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <form action="<?= base_url('/profil/update/' . $profil['id_user']) ?>" method="post">
        <input type="hidden" name="id_user" value="<?= $profil['id_user'] ?>">


        <div class="mb-3 row">
            <label for="nama_profil" class="col-md-2 col-form-label">Nama Profil</label>
            <div class="col-md-10">
                <input class="form-control" name="nama_profil" type="text"
                    value="<?= $profil['nama_profil'] ?>" id="nama_profil" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-md-2 col-form-label">Alamat</label>
            <div class="col-md-10">
                <textarea class="form-control" name="alamat" id="alamat"><?= $profil['alamat'] ?></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="no_telp" class="col-md-2 col-form-label">No. Telepon</label>
            <div class="col-md-10">
                <input class="form-control" name="no_telp" type="text"
                    value="<?= $profil['no_telp'] ?>" id="no_telp" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input class="form-control" name="email" type="email"
                    value="<?= $profil['email'] ?>" id="email" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="kelas" class="col-md-2 col-form-label">Kelas</label>
            <div class="col-md-10">
                <input class="form-control" name="kelas" type="text"
                    value="<?= $profil['kelas'] ?>" id="kelas" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="keterangan" class="col-md-2 col-form-label">Keterangan</label>
            <div class="col-md-10">
                <textarea class="form-control" name="keterangan" id="keterangan"><?= $profil['keterangan'] ?></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <a href="<?= base_url('/dashboard'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Profil</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>