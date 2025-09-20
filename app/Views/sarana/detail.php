<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 col-md-12 col-12">
    <div class="card-style mb-30">
        <h2 class="mb-25">Detail Sarana</h2>
        <div class="table-wrapper table-responsive">
            <table class="table">
                <tr>
                    <th>Kode Sarana</th>
                    <td><?= $sarana['kode_sarana'] ?></td>
                </tr>
                <tr>
                    <th>Nama Sarana</th>
                    <td><?= $sarana['nama_sarana'] ?></td>
                </tr>
                <tr>
                    <th>Jenis</th>
                    <td><?= $sarana['nama_jenis'] ?></td>
                </tr>
                <tr>
                    <th>Kondisi</th>
                    <td><?= $sarana['kondisi'] ?></td>
                </tr>
                <tr>
                    <th>Lokasi</th>
                    <td><?= $sarana['lokasi'] ?></td>
                </tr>
                <tr>
                    <th>Merk</th>
                    <td><?= $sarana['merk'] ?></td>
                </tr>
                <tr>
                    <th>Tipe</th>
                    <td><?= $sarana['tipe'] ?></td>
                </tr>
                <tr>
                    <th>Nomor Seri</th>
                    <td><?= $sarana['nomor_seri'] ?></td>
                </tr>
                <tr>
                    <th>Panjang</th>
                    <td><?= $sarana['panjang'] ?></td>
                </tr>
                <tr>
                    <th>Tinggi</th>
                    <td><?= $sarana['tinggi'] ?></td>
                </tr>
                <tr>
                    <th>Lebar</th>
                    <td><?= $sarana['lebar'] ?></td>
                </tr>
                <tr>
                    <th>Berat</th>
                    <td><?= $sarana['berat'] ?></td>
                </tr>
                <tr>
                    <th>Bahan</th>
                    <td><?= $sarana['bahan'] ?></td>
                </tr>
                <tr>
                    <th>Warna</th>
                    <td><?= $sarana['warna'] ?></td>
                </tr>
                <tr>
                    <th>Pinjam</th>
                    <td><?= $sarana['pinjam'] == 'boleh' ? 'Boleh Dipinjam' : 'Tidak Boleh Dipinjam' ?></td>
                </tr>
            </table>
        </div>
        <div class="button-group d-flex justify-content-start flex-wrap mt-3">
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-12">
    <div class="card-style mb-30">
        <?php if (!empty($fotos)): ?>
            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                <?php foreach ($fotos as $foto): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-2 mb-30">
                            <div class="card-image">
                                <a href="#0">
                                    <img src="<?= base_url('uploads/sarana/' . $foto['foto']); ?>" />
                                </a>
                            </div>
                            <div class="card-content">
                                <p>
                                    <?= esc($foto['keterangan']); ?>
                                </p>
                                <?php if (session()->get('role') === 'admin'): ?>
                                    <a href="<?= base_url('sarana/deleteFoto/' . $foto['id_foto'] . '/' . $sarana['id_sarana']); ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus foto ini?')">
                                        Hapus
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p><i>Belum ada foto untuk sarana ini.</i></p>
        <?php endif; ?>

        <hr>
        <?php if (session()->get('role') === 'admin'): ?>
            <p>Tambah Foto Baru</p>
            <br>
            <form action="<?= base_url('sarana/addFoto/' . $sarana['id_sarana']); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan Foto (Opsional)">
                </div>
                <button type="submit" class="main-btn primary-btn btn-hover">Upload Foto</button>
            </form>
        <?php endif; ?>
        <br>
        <a href="<?= site_url('sarana') ?>" class="main-btn light-btn btn-hover">Kembali</a>
    </div>
</div>
<?= $this->endSection(); ?>