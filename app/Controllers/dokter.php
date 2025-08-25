<?php
namespace App\Controllers;
use App\Models\KonsultasiModel;
use App\Models\PasienModel;
use App\Models\JadwalModel;

class Dokter extends BaseController
{
    // Dalam Controller/Dokter.php - method index()
public function index()
{
    $pasienModel = new PasienModel();
    $konsultasiModel = new KonsultasiModel();
    $jadwalModel = new JadwalModel();

    $total_pasien = $pasienModel->countAll();
    $jumlah_konsultasi = $konsultasiModel->countAll();
    $belum_ditangani = $konsultasiModel->where('status', 'Pending')->orWhere('status', NULL)->countAllResults();
    $jadwal_hari_ini = $jadwalModel
        ->where('tanggal', date('Y-m-d'))
        ->countAllResults();

    // Ambil data konsultasi terbaru langsung dari tabel konsultasi
    $konsultasi_terbaru = $konsultasiModel
        ->select('id, nama_pasien, keluhan, tanggal, status')
        ->orderBy('tanggal', 'DESC')
        ->limit(5)
        ->findAll();

    return view('dokter/index', [
        'total_pasien' => $total_pasien,
        'jumlah_konsultasi' => $jumlah_konsultasi,
        'belum_ditangani' => $belum_ditangani,
        'jadwal_hari_ini' => $jadwal_hari_ini,
        'konsultasi_terbaru' => $konsultasi_terbaru
    ]);
}

    public function __construct()
{
    $this->konsultasiModel = new \App\Models\KonsultasiModel();
}

public function konsultasi()
{
    $konsultasiModel = new KonsultasiModel();
    $data['konsultasi'] = $konsultasiModel
        ->select('id, nama_pasien, keluhan, tanggal, status')
        ->orderBy('tanggal', 'DESC')
        ->findAll();

    return view('dokter/konsultasi', $data);
}
public function balas($id)
{
    $model = new \App\Models\KonsultasiModel();
    $data['konsultasi'] = $model->find($id);
    return view('dokter/balas_konsultasi', $data);
}

public function simpanBalasan($id)
{
    $model = new \App\Models\KonsultasiModel();
    $data = [
        'diagnosa' => $this->request->getPost('diagnosa'),
        'resep'    => $this->request->getPost('resep'),
        'status'   => $this->request->getPost('status'),
    ];
    $model->update($id, $data);
    return redirect()->to('/dokter/konsultasi')->with('success', 'Balasan berhasil dikirim.');
}

public function tanggapiKonsultasi($id)
{
$model = new \App\Models\KonsultasiModel();
$konsultasi = $model->find($id);
if (!$konsultasi) {
    return redirect()->to('/dokter/riwayat_konsultasi')->with('error', 'Konsultasi tidak ditemukan');
}

return view('dokter/tanggapi_konsultasi', ['konsultasi' => $konsultasi]);
}

public function simpanTanggapan($id)
{
$model = new \App\Models\KonsultasiModel();
$konsultasi = $model->find($id);
if (!$konsultasi) {
    return redirect()->to('/dokter/riwayat_konsultasi')->with('error', 'Konsultasi tidak ditemukan');
}

$data = [
    'diagnosa' => $this->request->getPost('diagnosa'),
    'resep'    => $this->request->getPost('resep'),
    'status'   => $this->request->getPost('status'),
    'updated_at' => date('Y-m-d H:i:s')
];

$model->update($id, $data);

return redirect()->to('/dokter/riwayat_konsultasi')->with('success', 'Tanggapan berhasil disimpan');
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
    $pasienModel = new PasienModel();
    $jadwalModel = new JadwalModel();

    $data['konsultasi'] = $this->konsultasiModel->findAll();
    $data['total_pasien'] = $pasienModel->countAll();
    $data['jumlah_konsultasi'] = $this->konsultasiModel->countAll();
    $data['jadwal_hari_ini'] = $jadwalModel->where('tanggal', date('Y-m-d'))->countAllResults();
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
