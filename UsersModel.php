<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'username', 'password', 'role', 'foto'];

    public function getUsersByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }

    public function getUsersByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function search($keyword, $perPage)
    {
        return $this->like('nama', $keyword)
            ->orLike('role', $keyword)
            ->paginate($perPage);
    }
}
