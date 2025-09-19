<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <div class="profile-image text-center">
        <img src="<?= base_url('uploads/users/' . $users['foto']) ?>" width="50">
    </div>
    <br>
    <form action="<?= base_url('/users/update/' . $users['id_user']) ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="old_foto" value="<?= $users['foto'] ?>">
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
            <div class="col-md-10">
                <input class="form-control" name="nama" type="text" value="<?= $users['nama'] ?>" id="html5-text-input" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Username</label>
            <div class="col-md-10">
                <input class="form-control" name="username" type="text" value="<?= $users['username'] ?>" id="html5-text-input" />
            </div>
        </div>

        <input class="form-control" name="role" type="hidden" value="<?= $users['role'] ?>" id="html5-text-input" />

        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-10">
                <input class="form-control" name="password" type="text" id="html5-text-input" placeholder="kosongkan jika tidak ingin dirubah" />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Foto</label>
            <div class="col-md-10">
                <input class="form-control" name="foto" type="file" id="formFile" />
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <a href="<?= base_url('/'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah users</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>