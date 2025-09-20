<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoSaranaModel extends Model
{
    protected $table      = 'foto_sarana';
    protected $primaryKey = 'id_foto';
    protected $allowedFields = ['id_sarana', 'keterangan', 'foto'];
}
