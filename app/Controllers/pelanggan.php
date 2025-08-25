<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;
use App\Models\ProdukModel; // Pastikan ini di-import
use App\Models\LayananModel; // Pastikan ini di-import
use App\Models\UserModel; // Pastikan ini di-import
use App\Models\PesananModel; // <<< Import ini
use App\Models\DetailPesananModel; // <<< Import ini (jika Anda pakai tabel detail_pesanan)

class Pelanggan extends BaseController
{
    public function index()
    {
        return view('pelanggan/index');
    }

    public function produk()
    {
        $produkModel = new ProdukModel(); // Gunakan import
        $data['produk'] = $produkModel->findAll();
        return view('pelanggan/produk', $data);
    }

    public function layanan()
    {
        $layananModel = new LayananModel(); // Gunakan import
        $data['layanan'] = $layananModel->findAll();
        return view('pelanggan/layanan', $data);
    }

    public function detailLayanan($id)
    {
        $layananModel = new LayananModel(); // Gunakan import
        $layanan = $layananModel->find($id);

        if (!$layanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Layanan tidak ditemukan');
        }

        return view('pelanggan/detail_layanan', ['layanan' => $layanan]);
    }

    // Menampilkan halaman konsultasi + riwayat
    public function konsultasi()
    {
        $konsultasiModel = new KonsultasiModel(); // Gunakan import
        // Menggunakan 'id' dari sesi untuk user_id
        $userId = session()->get('id');
        $data['riwayat'] = $konsultasiModel
            ->where('user_id', $userId) // Menggunakan $userId yang sudah diambil
            ->orderBy('tanggal', 'desc')
            ->findAll();

        return view('pelanggan/konsultasi', $data);
    }

    // Proses pengiriman konsultasi
    public function kirimKonsultasi()
    {
        $konsultasiModel = new KonsultasiModel(); // Gunakan import

        $data = [
            'user_id'     => session()->get('id'), // Gunakan 'id' yang konsisten dengan user_id di tabel users
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'tanggal'     => date('Y-m-d'), // Hanya tanggal, konsisten dengan format DATE di DB
            'subjek'      => $this->request->getPost('subjek'),
            'keluhan'     => $this->request->getPost('pesan'),
            'status'      => 'Menunggu',
            // 'created_at'  => date('Y-m-d H:i:s') // Opsional, jika model tidak otomatis mengisi
        ];

        // Validasi data (sangat disarankan)
        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        $konsultasiModel->insert($data);

        return redirect()->to('/pelanggan/konsultasi')->with('success', 'Konsultasi berhasil dikirim.');
    }

    public function akun()
    {
        $userModel = new UserModel(); // Gunakan import
        $id = session()->get('id'); // Ambil ID pengguna dari sesi

        $user = $userModel->find($id);

        // Pastikan pengguna ditemukan sebelum mengirim ke view
        if (!$user) {
            // Handle jika user tidak ditemukan, mungkin redirect ke login atau halaman error
            return redirect()->to('/login')->with('error', 'User tidak ditemukan.');
        }

        return view('pelanggan/akun', ['user' => $user]);
    }

    public function updateProfil()
    {
        $session = session();
        $model = new UserModel(); // Gunakan import
        $id = $session->get('id');

        // Validasi input
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']', // sesuaikan nama tabel user
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];

        $model->update($id, $data);

        // Update session agar berubah juga
        $session->set([
            'nama' => $data['nama'],
            'email' => $data['email']
        ]);

        $session->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to('/pelanggan/akun');
    }

    public function ubahPassword()
    {
        $session = session();
        $model = new UserModel(); // Gunakan import
        $id = $session->get('id');

        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasiPassword = $this->request->getPost('konfirmasi_password'); // Perlu input konfirmasi password

        // Validasi password
        $rules = [
            'password_baru' => 'required|min_length[6]',
            'konfirmasi_password' => 'required|matches[password_baru]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($passwordBaru) {
            $model->update($id, [
                'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
            ]);

            $session->setFlashdata('success', 'Password berhasil diubah.');
        } else {
            $session->setFlashdata('error', 'Password baru tidak boleh kosong.');
        }

        return redirect()->to('/pelanggan/akun');
    }

    public function checkout()
    {
        $session = session();
        $keranjangItems = $session->get('cart') ?? []; // Asumsi nama sesi keranjang adalah 'keranjang'

        if (empty($keranjangItems)) {
            return redirect()->to('/pelanggan/keranjang')->with('error', 'Keranjang belanja Anda kosong, tidak dapat melanjutkan checkout.');
        }

        // Anda bisa pass data keranjang ke view checkout jika ingin menampilkannya di form
        $data['cart'] = $keranjangItems;
        $data['title'] = 'Form Checkout';
        return view('pelanggan/checkout', $data);
    }

    public function prosesCheckout()
{
    $session = session();
    $cart    = $session->get('cart');     // <─ keranjang berisi array detail

    if (empty($cart)) {
        return redirect()
            ->to('/pelanggan/keranjang')
            ->with('error', 'Keranjang kosong.');
    }

    // ambil data form
    $metodeBayar = $this->request->getPost('metode_pembayaran');
    $metodeKirim = $this->request->getPost('metode_pengiriman');
    $userId      = $session->get('id');

    // inisialisasi model
    $produkModel  = new \App\Models\ProdukModel();
    $pesananModel = new \App\Models\PesananModel();
    $detailModel  = new \App\Models\DetailPesananModel();

    $total  = 0;
    $items  = [];

    foreach ($cart as $produkId => $item) {
        // $item sekarang array: ['nama_produk', 'harga', 'qty', 'subtotal']
        $qty   = $item['qty'];
        $harga = $item['harga'];          // bisa diganti $produk['harga'] jika ingin lebih aman

        // (opsional) ambil ulang harga dari DB agar tidak bisa dimanipulasi di browser
        // $produk = $produkModel->find($produkId);
        // if (!$produk) continue;
        // $harga = $produk['harga'];

        $subtotal = $harga * $qty;
        $total   += $subtotal;

        $items[] = [
            'produk_id'    => $produkId,
            'qty'          => $qty,
            'harga_satuan' => $harga,
            'subtotal'     => $subtotal
        ];
    }

    // simpan ke tabel pesanan
    $pesananId = $pesananModel->insert([
        'user_id'           => $userId,
        'tanggal_pesanan'   => date('Y-m-d'),
        'total_harga'       => $total,
        'status_pesanan'    => 'pending',
        'metode_pembayaran' => $metodeBayar,
        'metode_pengiriman' => $metodeKirim
    ]);

    // simpan detail tiap item
    foreach ($items as $row) {
        $row['pesanan_id'] = $pesananId;
        $detailModel->insert($row);
    }

    // bersihkan keranjang
    $session->remove('cart');

    return redirect()
        ->to('/pelanggan/checkout/sukses')
        ->with('success', 'Pesanan berhasil dibuat.');
}

    public function checkoutSukses()
    {
        return view('pelanggan/checkout_sukses');
    }
}