<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranaModel extends Model
{
    protected $table = 'sarana';
    protected $primaryKey = 'id_sarana';
    protected $allowedFields = [
        'kode_sarana',
        'nama_sarana',
        'id_jenis',
        'merk',
        'tipe',
        'nomor_seri',
        'panjang',
        'lebar',
        'tinggi',
        'berat',
        'bahan',
        'warna',
        'jumlah',
        'kondisi',
        'lokasi',
        'pinjam',
        'tanggal_pengadaan',
        'sumber_anggaran',
        'harga_satuan',
        'keterangan'
    ];

    /**
     * Ambil data sarana berdasarkan kode_sarana
     */
    public function getSaranaByKode($kode_sarana)
    {
        return $this->where('kode_sarana', $kode_sarana)->first();
    }

    /**
     * Cari sarana berdasarkan keyword (nama_sarana, merk, tipe, lokasi, warna, bahan, keterangan)
     */
    public function search($keyword, $perPage = 10)
    {
        return $this->like('nama_sarana', $keyword)
            ->orLike('merk', $keyword)
            ->orLike('tipe', $keyword)
            ->orLike('lokasi', $keyword)
            ->orLike('warna', $keyword)
            ->orLike('bahan', $keyword)
            ->orLike('keterangan', $keyword)
            ->paginate($perPage);
    }

    /**
     * Ambil semua sarana yang bisa dipinjam
     */
    public function getSaranaBolehPinjam()
    {
        return $this->where('pinjam', 'Boleh')->findAll();
    }

    /**
     * Ambil data sarana berdasarkan jenis
     */
    public function getSaranaByJenis($id_jenis)
    {
        return $this->where('id_jenis', $id_jenis)->findAll();
    }
}
