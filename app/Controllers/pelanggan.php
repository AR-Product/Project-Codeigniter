<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        return view('pelanggan/index');
    }

    public function produk()
    {
        return view('pelanggan/produk');
    }

    public function layanan()
    {
        return view('pelanggan/layanan');
    }

    public function konsultasi()
    {
        return view('pelanggan/konsultasi');
    }
    public function akun()
{
    return view('pelanggan/akun');
}

public function updateProfil()
{
    $session = session();
    $model = new \App\Models\UserModel();
    $id = $session->get('id');

    // Tangkap data dari form
    $data = [
        'nama' => $this->request->getPost('nama'),
        'email' => $this->request->getPost('email'),
        'telepon' => $this->request->getPost('telepon'),
    ];

    // Validasi sederhana (opsional, bisa ditambah validasi lebih ketat)
    if (empty($data['nama']) || empty($data['email'])) {
        $session->setFlashdata('error', 'Nama dan Email tidak boleh kosong.');
        return redirect()->to('/pelanggan/akun');
    }

    // Update data
    $model->update($id, $data);

    // Simpan notifikasi berhasil
    $session->setFlashdata('success', 'Profil berhasil diperbarui.');

    // Redirect balik ke halaman akun
    return redirect()->to('/pelanggan/akun');
}


public function ubahPassword()
{
    $session = session();
    $model = new \App\Models\UserModel();
    $id = $session->get('id');

    $passwordBaru = $this->request->getPost('password_baru');

    if ($passwordBaru) {
        $model->update($id, [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
        ]);

        // Kasih notifikasi berhasil
        $session->setFlashdata('success', 'Password berhasil diubah.');
    } else {
        // Kalau tidak ada password baru dikirim
        $session->setFlashdata('error', 'Password baru tidak boleh kosong.');
    }

    // Setelah ubah password, redirect balik ke halaman akun
    return redirect()->to('/pelanggan/akun');
}

}
