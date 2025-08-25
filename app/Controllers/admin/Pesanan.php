<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\UserModel;

class Pesanan extends BaseController
{
    protected $pesananModel;
    protected $userModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->userModel = new UserModel();
    }

    public function index()
{
    $pesananModel = new \App\Models\PesananModel();
    $data['pesanan'] = $pesananModel
        ->select('pesanan.*, users.username')
        ->join('users', 'users.id = pesanan.user_id')
        ->orderBy('pesanan.created_at','DESC')
        ->findAll();

    return view('admin/pesanan/index', $data);
}

    public function detail($id)
{
    $pesananModel = new \App\Models\PesananModel();
    $detailModel  = new \App\Models\DetailPesananModel();

    $data['pesanan'] = $pesananModel
        ->select('pesanan.*, users.username, users.email')
        ->join('users', 'users.id = pesanan.user_id')
        ->find($id);

    $data['items'] = $detailModel
        ->select('pesanan_items.*, produk.nama_produk')
        ->join('produk', 'produk.id = pesanan_items.produk_id')
        ->where('pesanan_id', $id)
        ->findAll();

    return view('admin/pesanan/detail', $data);
}


    public function updateStatus($id)
    {
        if (!$this->validate([
            'status' => 'required|in_list[pending,diproses,dikirim,selesai,dibatalkan]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Status tidak valid');
        }

        $status = $this->request->getPost('status');
        
        if ($this->pesananModel->update($id, ['status' => $status])) {
            return redirect()->to('/admin/pesanan')->with('success', 'Status pesanan berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate status pesanan');
        }
    }

    public function cetak($id)
    {
        $pesanan = $this->pesananModel->getPesananWithItems($id);
        
        if (!$pesanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pesanan tidak ditemukan');
        }

        $data = [
            'title' => 'Invoice #' . $id,
            'pesanan' => $pesanan,
            'pelanggan' => $this->userModel->find($pesanan['user_id'])
        ];

        return view('admin/pesanan/cetak', $data);
    }

    public function export()
    {
        $data = [
            'title' => 'Data Pesanan',
            'pesanan' => $this->pesananModel->getAllPesanan()
        ];

        return view('admin/pesanan/export', $data);
    }
}