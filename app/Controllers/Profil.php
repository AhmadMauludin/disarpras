<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use CodeIgniter\Controller;

class Profil extends Controller
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function edit($idu)
    {
        $profil = $this->profilModel
            ->where('id_user', $idu)
            ->first();

        if (!$profil) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Profil untuk user $idu tidak ditemukan.");
        }

        return view('profil/edit', ['profil' => $profil]);
    }

    public function update($id_user)
    {
        $data = [
            'nama_profil' => $this->request->getPost('nama_profil'),
            'alamat'      => $this->request->getPost('alamat'),
            'no_telp'     => $this->request->getPost('no_telp'),
            'email'       => $this->request->getPost('email'),
            'kelas'       => $this->request->getPost('kelas'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        $this->profilModel->where('id_user', $id_user)->set($data)->update();

        return redirect()->to('/dashboard')->with('success', 'Profil berhasil diperbarui');
    }
}
