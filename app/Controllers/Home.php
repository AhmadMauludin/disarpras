<?php

namespace App\Controllers;

use App\Models\SaranaModel;
use App\Models\PeminjamanModel;

class Home extends BaseController
{
    protected $SaranaModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->SaranaModel = new SaranaModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $role   = session()->get('role');
        $idUser = session()->get('id_user'); // pastikan sudah diset di login

        if ($role === 'admin' || $role === 'kepsek') {
            // Statistik untuk admin & kepsek
            $data = [
                'title'         => 'Dashboard',
                'totalSarana'   => $this->SaranaModel->countAll(),
                'totalAll'      => $this->peminjamanModel->countAll(),
                'totalPending'  => $this->peminjamanModel->where('status', 'pending')->countAllResults(),
                'totalSetujui'  => $this->peminjamanModel->where('status', 'disetujui')->countAllResults(),
                'totalDipinjam' => $this->peminjamanModel->where('status', 'dipinjam')->countAllResults(),
                'totalTolak'    => $this->peminjamanModel->where('status', 'ditolak')->countAllResults(),
                'totalKembali'  => $this->peminjamanModel->where('status', 'dikembalikan')->countAllResults(),
            ];
        } else {
            // Notifikasi untuk siswa/guru
            $peminjaman = $this->peminjamanModel
                ->select('peminjaman.*, sarana.nama_sarana')
                ->join('sarana', 'sarana.id_sarana = peminjaman.id_sarana', 'left')
                ->where('peminjaman.id_user', $idUser)
                ->whereIn('status', ['disetujui', 'dipinjam'])
                ->findAll();

            $notifikasi = [];
            $today = date('Y-m-d');

            foreach ($peminjaman as $p) {
                if ($p['status'] === 'disetujui') {
                    $notifikasi[] = "Anda sedang meminjam <b>{$p['nama_sarana']}</b>";
                }

                if ($p['status'] === 'dipinjam' && $p['tanggal_kembali'] && $p['tanggal_kembali'] < $today) {
                    $notifikasi[] = "Segera kembalikan <b>{$p['nama_sarana']}</b>!";
                }
            }

            $data = [
                'title'      => 'Dashboard',
                'notifikasi' => $notifikasi
            ];
        }

        return view('layouts/dashboard', $data);
    }
}
