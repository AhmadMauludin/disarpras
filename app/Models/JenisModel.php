<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['nama_jenis', 'keterangan', 'foto'];

    public function getJenisByNamaJenis($nama_jenis)
    {
        return $this->where('nama_jenis', $nama_jenis)->first();
    }

    public function search($keyword, $perPage)
    {
        return $this->like('nama_jenis', $keyword)
            ->orLike('keterangan', $keyword)
            ->paginate($perPage);
    }
}
