<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\LayananModel;
use App\Models\KonsultasiModel;
use App\Models\UserModel;
use App\Models\PesananModel; // <<< TAMBAHKAN INI

class Admin extends BaseController
{
     public function dashboard()
    {
        $produkModel = new ProdukModel();
        $layananModel = new LayananModel();
        $konsultasiModel = new KonsultasiModel();
        $userModel = new UserModel();
        $pesananModel = new PesananModel(); // <<< Pastikan ini ada

        $today = date('Y-m-d');
        // Pastikan nama kolom 'tanggal_pesanan' sesuai dengan database Anda
        $totalPesananHariIni = $pesananModel->where('tanggal_pesanan', $today)->countAllResults();
        // Alternatif jika Anda menyimpan tanggal di created_at (tipe DATETIME/TIMESTAMP)
        // $totalPesananHariIni = $pesananModel->where('DATE(created_at)', $today)->countAllResults();


        $data = [
            'total_produk'      => $produkModel->countAll(),
            'total_layanan'     => $layananModel->countAll(),
            'total_konsultasi'  => $konsultasiModel->countAll(),
            'total_user'        => $userModel->countAll(),
            'total_pesanan_hari_ini' => $totalPesananHariIni
        ];

        return view('admin/dashboard', $data);
    }

    // Fungsi ini HARUS ada dan persis seperti ini
    public function getOrdersByDate()
    {
        // Debugging: Cek apakah fungsi ini terpanggil
        // log_message('debug', 'getOrdersByDate function called.');

        if (!$this->request->isAJAX() || $this->request->getMethod() !== 'get') {
            return $this->response->setStatusCode(405)->setJSON(['error' => 'Method Not Allowed or Not an AJAX request.']);
        }

        $selectedDate = $this->request->getGet('date');

        if (empty($selectedDate)) {
            // log_message('error', 'Date parameter is missing.');
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Parameter tanggal tidak ditemukan.']);
        }

        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $selectedDate)) {
            // log_message('error', 'Invalid date format: ' . $selectedDate);
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Format tanggal tidak valid (YYYY-MM-DD).']);
        }

        $pesananModel = new PesananModel();

        // Debugging: Cek tanggal yang diambil
        // log_message('debug', 'Selected Date: ' . $selectedDate);

        // Pastikan nama kolom 'tanggal_pesanan' sesuai dengan database Anda
        $totalPesananHariIni = $pesananModel->where('tanggal_pesanan', $selectedDate)->countAllResults();
        // Alternatif jika Anda menyimpan tanggal di created_at (tipe DATETIME/TIMESTAMP)
        // $totalPesananHariIni = $pesananModel->where('DATE(created_at)', $selectedDate)->countAllResults();


        // Debugging: Cek hasil query
        // log_message('debug', 'Total Pesanan for ' . $selectedDate . ': ' . $totalPesananHariIni);

        return $this->response->setJSON(['total_pesanan_hari_ini' => $totalPesananHariIni]);
    }
    // <<< AKHIR FUNGSI BARU

    public function produk()
    {
        $produkModel = new \App\Models\ProdukModel();

        $kategori = $this->request->getGet('kategori'); // misalnya: nama_produk
        $keyword = $this->request->getGet('keyword');   // misalnya: AA

        if ($kategori && $keyword) {
            $produkModel->like($kategori, $keyword);
        }

        $data['produk'] = $produkModel->findAll();
        $data['title'] = 'Kelola Produk';
        return view('admin/produk', $data);
    }


    public function tambahProduk()
    {
        $produkModel = new \App\Models\ProdukModel();

        $file = $this->request->getFile('gambar');

        if ($file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads', $namaGambar);

            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $namaGambar
            ];

            $produkModel->insert($data);

            return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Gagal upload gambar');
        }
    }

    public function editProduk($id)
    {
        $produkModel = new \App\Models\ProdukModel();
        $data['produk'] = $produkModel->find($id);

        if (!$data['produk']) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        return view('admin/edit_produk', $data);
    }

    public function updateProduk($id)
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id);

        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads', $namaGambar);
        } else {
            $namaGambar = $produk['gambar']; // gunakan gambar lama
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar
        ];

        $produkModel->update($id, $data);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function delete($id)
    {
        $model = new ProdukModel();
        $produk = $model->find($id);

        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan.');
        }

        if ($produk['gambar'] && file_exists('uploads/' . $produk['gambar'])) {
            unlink('uploads/' . $produk['gambar']);
        }

        $model->delete($id);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    }

    public function layanan()
    {
        $layananModel = new \App\Models\LayananModel();
        $data['layanan'] = $layananModel->findAll();
        return view('admin/layanan', $data);
    }


    public function tambahLayanan()
    {
        $layananModel = new \App\Models\LayananModel();

        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga')
        ];

        $layananModel->insert($data);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function editLayanan($id)
    {
        $model = new \App\Models\LayananModel();
        $data['layanan'] = $model->find($id);

        if (!$data['layanan']) {
            return redirect()->to('/admin/layanan')->with('error', 'Layanan tidak ditemukan.');
        }

        return view('admin/edit_layanan', $data);
    }

    public function updateLayanan($id)
    {
        $model = new \App\Models\LayananModel();

        $data = [
            'nama_layanan' => $this->request->getPost('nama_layanan'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function deleteLayanan($id)
    {
        $model = new \App\Models\LayananModel();
        $model->delete($id);

        return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus.');
    }

    public function konsultasi()
    {
        return view('admin/konsultasi');
    }

    public function akun()
    {
        $akunModel = new \App\Models\userModel(); // Pastikan Anda memiliki AkunModel
        $data['akun'] = $akunModel->findAll();
        return view('admin/akun', $data);
    }

    public function tambahAkun()
    {
        $akunModel = new \App\Models\userModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ];

        $akunModel->insert($data);

        return redirect()->to('/admin/akun')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function editAkun($id)
    {
        $akunModel = new \App\Models\userModel();
        $data['akun'] = $akunModel->find($id);

        if (!$data['akun']) {
            return redirect()->to('/admin/akun')->with('error', 'Akun tidak ditemukan.');
        }

        return view('admin/edit_akun', $data);
    }

    public function updateAkun($id)
    {
        $akunModel = new \App\Models\userModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
        ];

        $akunModel->update($id, $data);

        return redirect()->to('/admin/akun')->with('success', 'Akun berhasil diperbarui.');
    }

    public function deleteAkun($id)
    {
        $akunModel = new \App\Models\userModel();
        $akunModel->delete($id);

        return redirect()->to('/admin/akun')->with('success', 'Akun berhasil dihapus.');
    }


    public function logout()
    {
        session()->destroy(); // Menghapus semua data session
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }

    public function simpan()
    {
        $konsultasiModel = new \App\Models\KonsultasiModel();

        $data = [
            'user_id'     => $this->request->getPost('user_id'),
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'subjek'      => $this->request->getPost('subjek'),
            'keluhan'     => $this->request->getPost('keluhan'),
            'tanggal'     => date('Y-m-d H:i:s'),
            'status'      => 'Menunggu',
            'created_at'  => date('Y-m-d H:i:s')
        ];

        $konsultasiModel->insert($data);

        return redirect()->to('/admin/konsultasi')->with('success', 'Konsultasi berhasil disimpan!');
    }
    // Controller
public function pesanan() {
    return view('admin/pesanan', $data);
}

public function detail($id)
{
    $order = $this->orderModel->getDetail($id); // ambil data pesanan beserta items-nya

    if (!$order) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan tidak ditemukan");
    }

    return view('admin/pesanan/detail', [
        'order' => $order
    ]);
}

}
