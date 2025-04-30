<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use App\Models\Admin_model;

class Admin extends BaseController
{
    public function dashboard()
{
    $produkModel = new \App\Models\ProdukModel();
    $layananModel = new \App\Models\LayananModel();
    $konsultasiModel = new \App\Models\KonsultasiModel();
    $akunModel = new \App\Models\AkunModel();
$data['akun'] = $akunModel->findAll();  // Pastikan ini mengambil semua kolom termasuk email


    return view('admin/dashboard', $data);
}

public function produk()
{
    $produkModel = new \App\Models\ProdukModel();
    $data['produk'] = $produkModel->findAll();
    $data['title'] = 'Kelola Produk';
    return view('admin/produk', $data);
}

public function tambahProduk()
{
    $produkModel = new \App\Models\ProdukModel(); // <= ini penting!

    // Ambil file gambar
    $file = $this->request->getFile('gambar');

    // Cek apakah file valid dan belum dipindahkan
    if ($file->isValid() && !$file->hasMoved()) {
        // Generate nama acak dan pindahkan ke folder uploads
        $namaGambar = $file->getRandomName();
        $file->move('uploads', $namaGambar);

        // Data Produk
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar
        ];

        // INSERT ke database
        $produkModel->insert($data); // <= ini yang belum ada di kodinganmu

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

        // Hapus gambar jika ada
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
    $akunModel = new \App\Models\AkunModel();
    $data['akun'] = $akunModel->findAll();
    return view('admin/akun', $data);
}

public function tambahAkun()
{
    $akunModel = new \App\Models\AkunModel();

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
    $akunModel = new \App\Models\AkunModel();
    $data['akun'] = $akunModel->find($id);

    if (!$data['akun']) {
        return redirect()->to('/admin/akun')->with('error', 'Akun tidak ditemukan.');
    }

    return view('admin/edit_akun', $data);
}

public function updateAkun($id)
{
    $akunModel = new \App\Models\AkunModel();

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
    $akunModel = new \App\Models\AkunModel();
    $akunModel->delete($id);

    return redirect()->to('/admin/akun')->with('success', 'Akun berhasil dihapus.');
}


    public function logout()
{
    session()->destroy(); // Menghapus semua data session
    return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
}

}
