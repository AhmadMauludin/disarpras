<?php

namespace App\Controllers;

use App\Models\JenisModel;
use CodeIgniter\Controller;

class Jenis extends Controller
{
    protected $jenisModel;

    public function __construct()
    {
        $this->jenisModel = new JenisModel();
    }

    // Menampilkan halaman views/jenis/index (data jenis, hanya dapat diakses admin)
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // Jumlah data per halaman

        if ($keyword) {
            $jenis = $this->jenisModel->search($keyword, $perPage);
        } else {
            $jenis = $this->jenisModel->paginate($perPage);
        }

        $data = [
            'title'  => 'Data jenis',
            'jenis' => $jenis,
            'pager'  => $this->jenisModel->pager, // Untuk pagination
            'keyword' => $keyword
        ];
        return view('jenis/index', $data);
    }

    // Menampilkan halaman views/jenis/create (halaman daftar jenis)
    public function create()
    {
        $data = [
            'title'  => 'Tambah jenis',
        ];
        return view('jenis/create', $data);
    }

    // Menyimpan data jenis baru yang diinput dari halaman daftar
    public function store()
    {
        $model = new JenisModel();
        $data = [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto' => $this->uploadFoto()
        ];

        $model->insert($data);
        return redirect()->to('/jenis')->with('success', 'Data keterangan sudah ditambahkan.');
    }

    // Menampilkan halaman views/jenis/edit (pengaturan)
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Jenis',
        ];

        $model = new JenisModel();
        $data['jenis'] = $model->find($id);
        return view('jenis/edit', $data);
    }

    // Mengupdate data jenis yang diubah pada halaman edit (pengaturan)
    public function update($id)
    {
        $model = new JenisModel();
        $jenis = $model->find($id);
        $data = [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($foto = $this->uploadFoto()) {
            $data['foto'] = $foto;
        }

        $model->update($id, $data);
        return redirect()->to('/jenis')->with('success', 'Data jenis berhasil diperbarui.');
    }

    // Menghapus data jenis (Hanya dapat dilakukan oleh admin)
    public function delete($id)
    {
        $model = new JenisModel();
        $model->delete($id);
        return redirect()->to('/jenis')->with('success', 'Data jenis berhasil dihapus.');
    }

    // Upload foto untuk tambah atau edit jenis
    private function uploadFoto()
    {
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/jenis/', $newName);
            return $newName;
        }
        return null;
    }
}
