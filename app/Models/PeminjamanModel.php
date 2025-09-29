<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = [
        'id_user',
        'id_sarana',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];

    // ambil semua data dengan join user & sarana
    public function getAllPeminjaman()
    {
        return $this->select('peminjaman.*, users.nama as nama_user, sarana.*')
            ->join('users', 'users.id_user = peminjaman.id_user', 'left')
            ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana', 'left')
            ->findAll();
    }

    // ambil data berdasarkan user tertentu
    public function getByUser($id_user)
    {
        return $this->select('peminjaman.*, users.nama as nama_user, sarana.*')
            ->join('users', 'users.id_user = peminjaman.id_user', 'left')
            ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana', 'left')
            ->where('peminjaman.id_user', $id_user)
            ->findAll();
    }
}
