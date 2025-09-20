<?php

namespace App\Controllers;

use App\Models\SaranaModel;
use App\Models\JenisModel;
use CodeIgniter\Controller;

class Sarana extends Controller
{
    protected $saranaModel;
    protected $jenisModel;

    public function __construct()
    {
        $this->saranaModel = new SaranaModel();
        $this->jenisModel  = new JenisModel();
    }

    // Menampilkan halaman views/sarana/index (daftar sarana)
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10; // jumlah data per halaman

        if ($keyword) {
            $sarana = $this->saranaModel
                ->select('sarana.*, jenis.nama_jenis')
                ->join('jenis', 'jenis.id_jenis = sarana.id_jenis', 'left')
                ->like('sarana.nama_sarana', $keyword)
                ->orLike('sarana.kode_sarana', $keyword)
                ->orLike('jenis.nama_jenis', $keyword)
                ->paginate($perPage);
        } else {
            $sarana = $this->saranaModel
                ->select('sarana.*, jenis.nama_jenis')
                ->join('jenis', 'jenis.id_jenis = sarana.id_jenis', 'left')
                ->paginate($perPage);
        }

        $data = [
            'title'   => 'Data Sarana',
            'sarana'  => $sarana,
            'pager'   => $this->saranaModel->pager,
            'keyword' => $keyword
        ];
        return view('sarana/index', $data);
    }


    // Menampilkan halaman form create sarana
    public function create()
    {
        $data = [
            'title' => 'Tambah Sarana',
            'jenis' => $this->jenisModel->findAll() // ambil semua jenis untuk dropdown
        ];
        return view('sarana/create', $data);
    }

    // Menyimpan data sarana baru
    public function store()
    {
        $data = [
            'kode_sarana'     => $this->request->getPost('kode_sarana'),
            'nama_sarana'     => $this->request->getPost('nama_sarana'),
            'id_jenis'        => $this->request->getPost('id_jenis'),
            'merk'            => $this->request->getPost('merk'),
            'tipe'            => $this->request->getPost('tipe'),
            'nomor_seri'      => $this->request->getPost('nomor_seri'),
            'panjang'         => $this->request->getPost('panjang'),
            'lebar'           => $this->request->getPost('lebar'),
            'tinggi'          => $this->request->getPost('tinggi'),
            'berat'           => $this->request->getPost('berat'),
            'bahan'           => $this->request->getPost('bahan'),
            'warna'           => $this->request->getPost('warna'),
            'jumlah'          => $this->request->getPost('jumlah'),
            'kondisi'         => $this->request->getPost('kondisi'),
            'lokasi'          => $this->request->getPost('lokasi'),
            'pinjam'          => $this->request->getPost('pinjam'),
            'tanggal_pengadaan' => $this->request->getPost('tanggal_pengadaan'),
            'sumber_anggaran' => $this->request->getPost('sumber_anggaran'),
            'harga_satuan'    => $this->request->getPost('harga_satuan'),
            'keterangan'      => $this->request->getPost('keterangan')
        ];

        $this->saranaModel->insert($data);
        return redirect()->to('/sarana')->with('success', 'Data sarana berhasil ditambahkan.');
    }

    // Menampilkan halaman edit sarana
    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Sarana',
            'sarana' => $this->saranaModel->find($id),
            'jenis'  => $this->jenisModel->findAll() // dropdown jenis
        ];

        return view('sarana/edit', $data);
    }

    // Mengupdate data sarana
    public function update($id)
    {
        $data = [
            'kode_sarana'     => $this->request->getPost('kode_sarana'),
            'nama_sarana'     => $this->request->getPost('nama_sarana'),
            'id_jenis'        => $this->request->getPost('id_jenis'),
            'merk'            => $this->request->getPost('merk'),
            'tipe'            => $this->request->getPost('tipe'),
            'nomor_seri'      => $this->request->getPost('nomor_seri'),
            'panjang'         => $this->request->getPost('panjang'),
            'lebar'           => $this->request->getPost('lebar'),
            'tinggi'          => $this->request->getPost('tinggi'),
            'berat'           => $this->request->getPost('berat'),
            'bahan'           => $this->request->getPost('bahan'),
            'warna'           => $this->request->getPost('warna'),
            'jumlah'          => $this->request->getPost('jumlah'),
            'kondisi'         => $this->request->getPost('kondisi'),
            'lokasi'          => $this->request->getPost('lokasi'),
            'pinjam'          => $this->request->getPost('pinjam'),
            'tanggal_pengadaan' => $this->request->getPost('tanggal_pengadaan'),
            'sumber_anggaran' => $this->request->getPost('sumber_anggaran'),
            'harga_satuan'    => $this->request->getPost('harga_satuan'),
            'keterangan'      => $this->request->getPost('keterangan')
        ];

        $this->saranaModel->update($id, $data);
        return redirect()->to('/sarana')->with('success', 'Data sarana berhasil diperbarui.');
    }

    // Menghapus data sarana
    public function delete($id)
    {
        $this->saranaModel->delete($id);
        return redirect()->to('/sarana')->with('success', 'Data sarana berhasil dihapus.');
    }

    public function detail($id)
    {
        // ambil sarana + jenis
        $sarana = $this->saranaModel
            ->select('sarana.*, jenis.nama_jenis')
            ->join('jenis', 'jenis.id_jenis = sarana.id_jenis', 'left')
            ->find($id);

        if (!$sarana) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data sarana dengan ID $id tidak ditemukan.");
        }

        // ambil foto-foto terkait sarana
        $fotoModel = new \App\Models\FotoSaranaModel();
        $fotos = $fotoModel->where('id_sarana', $id)->findAll();

        $data = [
            'title'  => 'Detail Sarana',
            'sarana' => $sarana,
            'fotos'  => $fotos
        ];

        return view('sarana/detail', $data);
    }


    public function addFoto($id)
    {
        $fotoModel = new \App\Models\FotoSaranaModel();

        // validasi file
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/sarana', $newName);

            $fotoModel->insert([
                'id_sarana'   => $id,
                'foto'        => $newName,
                'keterangan'  => $this->request->getPost('keterangan'),
            ]);
        }

        return redirect()->to('/sarana/detail/' . $id)->with('success', 'Foto berhasil ditambahkan');
    }

    public function deleteFoto($id_foto, $id_sarana)
    {
        $fotoModel = new \App\Models\FotoSaranaModel();

        $foto = $fotoModel->find($id_foto);
        if ($foto) {
            // hapus file fisik
            $path = FCPATH . 'uploads/sarana/' . $foto['foto'];
            if (file_exists($path)) {
                unlink($path);
            }

            // hapus data dari DB
            $fotoModel->delete($id_foto);
        }

        return redirect()->to('/sarana/detail/' . $id_sarana)
            ->with('success', 'Foto berhasil dihapus');
    }
}
