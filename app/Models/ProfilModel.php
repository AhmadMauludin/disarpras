<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    protected $allowedFields = [
        'nama_profil',
        'alamat',
        'no_telp',
        'email',
        'kelas',
        'keterangan',
        'id_user'
    ];
}
