<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= base_url('/sarana/store') ?>" method="post" enctype="multipart/form-data">
    <div class="card-style mb-30">
        <h6 class="mb-25">Tambah Sarana</h6>

        <div class="input-style-1">
            <label>Kode Sarana</label>
            <input type="text" name="kode_sarana" placeholder="Kode Sarana" required />
        </div>

        <div class="input-style-1">
            <label>Nama Sarana</label>
            <input type="text" name="nama_sarana" placeholder="Nama Sarana" required />
        </div>

        <div class="select-style-1">
            <label>Jenis Sarana</label>
            <div class="select-position">
                <select name="id_jenis" required>
                    <option value="">Pilih Jenis</option>
                    <?php foreach ($jenis as $j): ?>
                        <option value="<?= $j['id_jenis']; ?>"><?= $j['nama_jenis']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="input-style-1">
            <label>Merk</label>
            <input type="text" name="merk" placeholder="Merk" />
        </div>

        <div class="input-style-1">
            <label>Tipe</label>
            <input type="text" name="tipe" placeholder="Tipe / Model" />
        </div>

        <div class="input-style-1">
            <label>Nomor Seri</label>
            <input type="text" name="nomor_seri" placeholder="Nomor Seri" />
        </div>

        <div class="input-style-1">
            <label>Panjang (cm)</label>
            <input type="number" step="0.01" name="panjang" placeholder="Panjang" />
        </div>

        <div class="input-style-1">
            <label>Lebar (cm)</label>
            <input type="number" step="0.01" name="lebar" placeholder="Lebar" />
        </div>

        <div class="input-style-1">
            <label>Tinggi (cm)</label>
            <input type="number" step="0.01" name="tinggi" placeholder="Tinggi" />
        </div>

        <div class="input-style-1">
            <label>Berat (kg)</label>
            <input type="number" step="0.01" name="berat" placeholder="Berat" />
        </div>

        <div class="input-style-1">
            <label>Bahan</label>
            <input type="text" name="bahan" placeholder="Bahan" />
        </div>

        <div class="input-style-1">
            <label>Warna</label>
            <input type="text" name="warna" placeholder="Warna" />
        </div>

        <div class="input-style-1">
            <label>Jumlah</label>
            <input type="number" name="jumlah" placeholder="Jumlah" required />
        </div>

        <div class="select-style-1">
            <label>Kondisi</label>
            <div class="select-position">
                <select name="kondisi">
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>
        </div>

        <div class="input-style-1">
            <label>Lokasi</label>
            <input type="text" name="lokasi" placeholder="Lokasi" required />
        </div>

        <div class="select-style-1">
            <label>Boleh Dipinjam?</label>
            <div class="select-position">
                <select name="pinjam">
                    <option value="Boleh">Boleh</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
        </div>

        <div class="input-style-1">
            <label>Tanggal Pengadaan</label>
            <input type="date" name="tanggal_pengadaan" required />
        </div>

        <div class="input-style-1">
            <label>Sumber Anggaran</label>
            <input type="text" name="sumber_anggaran" placeholder="Sumber Anggaran" />
        </div>

        <div class="input-style-1">
            <label>Harga Satuan (Rp)</label>
            <input type="number" step="0.01" name="harga_satuan" placeholder="Harga Satuan" />
        </div>

        <div class="input-style-1">
            <label>Keterangan</label>
            <textarea name="keterangan" placeholder="Keterangan tambahan"></textarea>
        </div>

        <div class="button-group d-flex justify-content-center flex-wrap">
            <button class="main-btn primary-btn btn-hover w-100 text-center">
                Tambahkan
            </button>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>