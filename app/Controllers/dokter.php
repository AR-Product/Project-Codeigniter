<?php
namespace App\Controllers;
use App\Models\KonsultasiModel;
use App\Models\PasienModel;
use App\Models\JadwalModel;

class Dokter extends BaseController
{
    public function index()
    {
        $pasienModel = new PasienModel();
        $konsultasiModel = new KonsultasiModel();
        $jadwalModel = new JadwalModel();

        $total_pasien = $pasienModel->countAll();
        $jumlah_konsultasi = $konsultasiModel->countAll();
        $jadwal_hari_ini = $jadwalModel
            ->where('tanggal', date('Y-m-d'))
            ->countAllResults();

        return view('dokter/index', [
            'total_pasien' => $total_pasien,
            'jumlah_konsultasi' => $jumlah_konsultasi,
            'jadwal_hari_ini' => $jadwal_hari_ini
        ]);
    }

    public function __construct()
{
    $this->konsultasiModel = new \App\Models\KonsultasiModel();
}

    public function konsultasi()
    {
        return view('dokter/konsultasi'); // Buat view-nya di /app/Views/dokter/konsultasi.php
    }
    

    public function profil()
    {
        return view('dokter/profil'); // Buat view-nya di /app/Views/dokter/profil.php
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Konsultasi';
        return view('dokter/tambah_konsultasi', $data);
    }

    public function simpan()
{
    $nama_pasien = $this->request->getPost('nama_pasien');
    $tanggal = $this->request->getPost('tanggal');

    // Cek data duplikat
    $cek = $this->konsultasiModel->where('nama_pasien', $nama_pasien)
                                 ->where('tanggal', $tanggal)
                                 ->first();

    if ($cek) {
        return redirect()->back()->with('error', 'Data konsultasi untuk pasien dan tanggal tersebut sudah ada.');
    }

    $data = [
        'nama_pasien' => $nama_pasien,
        'tanggal'     => $tanggal,
        'keluhan'     => $this->request->getPost('keluhan'),
        'diagnosa'    => $this->request->getPost('diagnosa'),
        'resep'       => $this->request->getPost('resep'),
    ];

    $this->konsultasiModel->insert($data);

    return redirect()->to('/dokter/riwayat_konsultasi')->with('success', 'Konsultasi berhasil ditambahkan!');
}


    public function riwayat_konsultasi()
    {
        $data['konsultasi'] = $this->konsultasiModel->findAll();
        $data['title'] = 'Riwayat Konsultasi';
        return view('dokter/riwayat_konsultasi', $data);
    }
    
    public function edit($id)
    {
        $data['konsultasi'] = $this->konsultasiModel->find($id);

        if (!$data['konsultasi']) {
            return redirect()->to('/konsultasi')->with('error', 'Data konsultasi tidak ditemukan.');
        }

        $data['title'] = 'Edit Konsultasi';
        return view('konsultasi/edit_konsultasi', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'tanggal'     => $this->request->getPost('tanggal'),
            'keluhan'     => $this->request->getPost('keluhan'),
            'diagnosa'    => $this->request->getPost('diagnosa'),
            'resep'       => $this->request->getPost('resep'),
        ];

        $this->konsultasiModel->update($id, $data);

        return redirect()->to('/konsultasi')->with('success', 'Konsultasi berhasil diperbarui!');
    }

    public function detail($id)
    {
        $data['konsultasi'] = $this->konsultasiModel->find($id);

        if (!$data['konsultasi']) {
            return redirect()->to('/konsultasi')->with('error', 'Data konsultasi tidak ditemukan.');
        }

        $data['title'] = 'Detail Konsultasi';
        return view('konsultasi/detail_konsultasi', $data);
    }

    public function delete($id)
    {
        $this->konsultasiModel->delete($id);
        return redirect()->to('/konsultasi')->with('success', 'Konsultasi berhasil dihapus!');
    }


}
