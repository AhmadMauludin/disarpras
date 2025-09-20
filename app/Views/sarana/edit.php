<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="card-body">

    <form action="<?= base_url('/sarana/update/' . $sarana['id_sarana']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Kode Sarana</label>
            <div class="col-md-10">
                <input class="form-control" name="kode_sarana" type="text" value="<?= $sarana['kode_sarana'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Nama Sarana</label>
            <div class="col-md-10">
                <input class="form-control" name="nama_sarana" type="text" value="<?= $sarana['nama_sarana'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Jenis</label>
            <div class="col-md-10">
                <select name="id_jenis" class="form-control">
                    <option value="">Pilih Jenis</option>
                    <?php foreach ($jenis as $j): ?>
                        <option value="<?= $j['id_jenis'] ?>" <?= $sarana['id_jenis'] == $j['id_jenis'] ? 'selected' : '' ?>>
                            <?= $j['nama_jenis'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Kondisi</label>
            <div class="col-md-10">
                <select name="kondisi" class="form-control">
                    <option value="baik" <?= $sarana['kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                    <option value="rusak ringan" <?= $sarana['kondisi'] == 'rusak ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                    <option value="rusak berat" <?= $sarana['kondisi'] == 'rusak berat' ? 'selected' : '' ?>>Rusak Berat</option>
                    <option value="hilang" <?= $sarana['kondisi'] == 'hilang' ? 'selected' : '' ?>>hilang</option>

                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Lokasi</label>
            <div class="col-md-10">
                <input class="form-control" name="lokasi" type="text" value="<?= $sarana['lokasi'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Merk</label>
            <div class="col-md-10">
                <input class="form-control" name="merk" type="text" value="<?= $sarana['merk'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Tipe</label>
            <div class="col-md-10">
                <input class="form-control" name="tipe" type="text" value="<?= $sarana['tipe'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Nomor Seri</label>
            <div class="col-md-10">
                <input class="form-control" name="nomor_seri" type="text" value="<?= $sarana['nomor_seri'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Ukuran (P x L x T)</label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col">
                        <input class="form-control" name="panjang" type="text" value="<?= $sarana['panjang'] ?>" placeholder="Panjang" />
                    </div>
                    <div class="col">
                        <input class="form-control" name="lebar" type="text" value="<?= $sarana['lebar'] ?>" placeholder="Lebar" />
                    </div>
                    <div class="col">
                        <input class="form-control" name="tinggi" type="text" value="<?= $sarana['tinggi'] ?>" placeholder="Tinggi" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Berat</label>
            <div class="col-md-10">
                <input class="form-control" name="berat" type="text" value="<?= $sarana['berat'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Bahan</label>
            <div class="col-md-10">
                <input class="form-control" name="bahan" type="text" value="<?= $sarana['bahan'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Warna</label>
            <div class="col-md-10">
                <input class="form-control" name="warna" type="text" value="<?= $sarana['warna'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Jumlah</label>
            <div class="col-md-10">
                <input class="form-control" name="jumlah" type="text" value="<?= $sarana['jumlah'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Lokasi</label>
            <div class="col-md-10">
                <input class="form-control" name="lokasi" type="text" value="<?= $sarana['lokasi'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Tanggal Pengadaan</label>
            <div class="col-md-10">
                <input class="form-control" name="tanggal_pengadaan" type="date" value="<?= $sarana['tanggal_pengadaan'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Sumber Anggaran</label>
            <div class="col-md-10">
                <input class="form-control" name="sumber_anggaran" type="text" value="<?= $sarana['sumber_anggaran'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Pinjam</label>
            <div class="col-md-10">
                <select name="pinjam" class="form-control">
                    <option value="Boleh" <?= $sarana['pinjam'] == 'Boleh' ? 'selected' : '' ?>>Boleh</option>
                    <option value="Tidak" <?= $sarana['pinjam'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Harga Satuan</label>
            <div class="col-md-10">
                <input class="form-control" name="harga_satuan" type="number" value="<?= $sarana['harga_satuan'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">Keterangan</label>
            <div class="col-md-10">
                <input class="form-control" name="keterangan" type="decimal" value="<?= $sarana['keterangan'] ?>" />
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-md-2 col-form-label"></label>
            <div class="col-md-10">
                <a href="<?= base_url('sarana'); ?>" type="button" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah Sarana</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>