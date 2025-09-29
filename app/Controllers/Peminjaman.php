<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\SaranaModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Peminjaman extends BaseController
{
    protected $peminjamanModel;
    protected $saranaModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->saranaModel = new SaranaModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $perPage = 10;
        $role    = session()->get('role');
        $idUser  = session()->get('id_user');

        $builder = $this->peminjamanModel
            ->select('peminjaman.*, users.nama as nama_user, sarana.*')
            ->join('users', 'users.id_user = peminjaman.id_user', 'left')
            ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana', 'left');

        // Kalau bukan admin/kepala sekolah → hanya bisa lihat pinjaman miliknya
        if (!in_array($role, ['admin', 'kepsek'])) {
            $builder->where('peminjaman.id_user', $idUser);
        }

        // Tambahkan pencarian
        if ($keyword) {
            $builder->groupStart()
                ->like('users.nama', $keyword)
                ->orLike('sarana.nama_sarana', $keyword)
                ->orLike('peminjaman.status', $keyword)
                ->groupEnd();
        }

        $peminjaman = $builder->paginate($perPage);

        $data = [
            'title'      => 'Data Peminjaman',
            'peminjaman' => $peminjaman,
            'pager'      => $this->peminjamanModel->pager,
            'keyword'    => $keyword,
            'role'       => $role
        ];

        return view('peminjaman/index', $data);
    }

    // Form tambah peminjaman
    public function create()
    {
        $data = [
            'title' => 'Tambah Peminjaman',
            'sarana' => $this->saranaModel
                ->where('pinjam', 'Boleh')
                ->findAll()
        ];
        return view('peminjaman/create', $data);
    }

    // Simpan peminjaman baru
    public function store()
    {
        $this->peminjamanModel->save([
            'id_user' => session()->get('id_user'),
            'id_sarana' => $this->request->getPost('id_sarana'),
            'tanggal_pinjam' => $this->request->getPost('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getPost('tanggal_kembali'),
            'status' => 'pending'
        ]);

        return redirect()->to('/peminjaman')->with('success', 'Peminjaman berhasil ditambahkan, menunggu konfirmasi.');
    }

    // Konfirmasi peminjaman (khusus admin/kepala sekolah)
    public function edit($id)
    {
        $peminjaman = $this->peminjamanModel
            ->select('peminjaman.*, users.nama as nama_user, sarana.*')
            ->join('users', 'users.id_user = peminjaman.id_user', 'left')
            ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana', 'left')
            ->find($id);

        $data = [
            'title' => 'Konfirmasi Peminjaman',
            'peminjaman' => $peminjaman
        ];
        return view('peminjaman/edit', $data);
    }

    public function update($id)
    {
        $this->peminjamanModel->update($id, [
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/peminjaman')->with('success', 'Status peminjaman berhasil diperbarui.');
    }


    public function cetak($id)
    {
        $peminjaman = $this->peminjamanModel
            ->select('peminjaman.*, users.nama as nama_user, sarana.*')
            ->join('users', 'users.id_user = peminjaman.id_user')
            ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana')
            ->where('id_peminjaman', $id)
            ->first();

        if (!$peminjaman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Render view khusus cetak
        $html = view('peminjaman/cetak', ['peminjaman' => $peminjaman]);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output ke browser sebagai PDF
        $dompdf->stream("bukti_peminjaman_" . $id . ".pdf", [
            "Attachment" => false  // true kalau ingin langsung download
        ]);
    }

    public function cancel($id)
    {
        $peminjamanModel = new \App\Models\PeminjamanModel();

        $peminjaman = $peminjamanModel->find($id);

        if ($peminjaman && in_array(session()->get('role'), ['siswa', 'guru'])) {
            // hanya bisa dicancel jika masih pending
            if ($peminjaman['status'] === 'pending') {
                $peminjamanModel->update($id, ['status' => 'cancel']);
                return redirect()->back()->with('success', 'Peminjaman berhasil dibatalkan.');
            }
            return redirect()->back()->with('error', 'Peminjaman tidak bisa dibatalkan.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    public function delete($id)
    {
        $peminjamanModel = new \App\Models\PeminjamanModel();

        if (session()->get('role') === 'admin') {
            $peminjamanModel->delete($id);
            return redirect()->back()->with('success', 'Peminjaman berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki akses.');
    }
}
