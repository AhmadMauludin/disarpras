<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    // Menampilkan halaman views/users/index (data users, hanya dapat diakses admin)
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $users = $this->usersModel->search($keyword, $perPage);
        } else {
            $users = $this->usersModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data users',
            'users' => $users,
            'pager'  => $this->usersModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];
        return view('users/index', $data);
    }

    // Menampilkan halaman views/users/create (halaman daftar users)
    public function create()
    {
        $data = [
            'title'  => 'Tambah users',
        ];
        return view('users/create', $data);
    }

    // Menyimpan data users baru yang diinput dari halaman daftar
    public function store()
    {
        $model = new UsersModel();
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
            'password' => $password,
            'foto' => $this->uploadFoto()
        ];

        $model->insert($data);
        return redirect()->to('/')->with('success', 'Anda telah terdaftar, silahkan login.');
    }

    // Menampilkan halaman views/users/edit (pengaturan)
    public function edit($id)
    {
        $data = [
            'title'  => 'Tambah users',
        ];

        $model = new UsersModel();
        $data['users'] = $model->find($id);
        return view('users/edit', $data);
    }

    // Mengupdate data users yang diubah pada halaman edit (pengaturan)
    public function update($id)
    {
        $model = new UsersModel();
        $users = $model->find($id);
        $password = $this->request->getPost('password') ? password_hash($this->request->getPost('password'), PASSWORD_DEFAULT) : $users['password'];

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
            'password' => $password
        ];

        if ($foto = $this->uploadFoto()) {
            $data['foto'] = $foto;
        }

        $model->update($id, $data);
        return redirect()->to('/')->with('success', 'Data users berhasil diperbarui.');
    }

    // Menghapus data users (Hanya dapat dilakukan oleh admin)
    public function delete($id)
    {
        $model = new UsersModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'Data users berhasil dihapus.');
    }

    // Upload foto untuk tambah atau edit users
    private function uploadFoto()
    {
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/users/', $newName);
            return $newName;
        }
        return null;
    }
}
