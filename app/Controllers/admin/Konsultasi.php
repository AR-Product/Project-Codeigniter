<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KonsultasiModel;
use App\Models\UserModel;

class Konsultasi extends BaseController
{
    protected $konsultasiModel;
    protected $userModel;

    public function __construct()
    {
        $this->konsultasiModel = new KonsultasiModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Konsultasi',
            'konsultasi' => $this->konsultasiModel->getKonsultasiWithUser(),
            'users' => $this->userModel->findAll()
        ];

        return view('admin/konsultasi', $data);
    }

    public function simpan()
    {
        $userId = $this->request->getPost('user_id');
        $subjek = $this->request->getPost('subjek');
        $keluhan = $this->request->getPost('keluhan');

        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        $data = [
            'user_id'     => $userId,
            'nama_pasien' => $user['username'],
            'subjek'      => $subjek,
            'keluhan'     => $keluhan,
            'status'      => 'Menunggu',
            'tanggal'     => date('Y-m-d H:i:s'),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        $this->konsultasiModel->insert($data);

        return redirect()->to('/admin/konsultasi')->with('success', 'Konsultasi berhasil disimpan!');
    }

   public function detail($id)
{
    $model = new KonsultasiModel();

    $konsultasi = $model->select('konsultasi.*, users.username AS nama_pasien')
                        ->join('users', 'users.id = konsultasi.user_id')
                        ->find($id);

    if (!$konsultasi) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
    }

    return view('admin/konsultasi/detail', [
        'konsultasi' => $konsultasi
    ]);
}

public function hapus($id)
    {
        $model = new KonsultasiModel();

        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/admin/konsultasi')
                             ->with('error', 'Data tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/admin/konsultasi')
                         ->with('success', 'Data berhasil dihapus.');
    }
}