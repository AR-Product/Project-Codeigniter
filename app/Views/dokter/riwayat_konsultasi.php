<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar Dokter -->
<?= $this->include('layout/navbar_dokter') ?>

<!-- Bagian Dashboard di atas -->
<div class="container mt-5">
    <h2 class="text-center mb-5">Selamat Datang Dokter🩺</h2>

    <div class="row g-4">
        <!-- Total Pasien -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Pasien</h5>
                    <p class="display-6 text-primary fw-bold"><?= $total_pasien ?></p>
                </div>
            </div>
        </div>

        <!-- Jumlah Konsultasi -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Konsultasi</h5>
                    <p class="display-6 text-success fw-bold"><?= $jumlah_konsultasi ?></p>
                </div>
            </div>
        </div>

        <!-- Jadwal Hari Ini -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Jadwal Hari Ini</h5>
                    <p class="display-6 text-danger fw-bold"><?= $jadwal_hari_ini ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bagian Daftar Konsultasi -->
<div class="container py-5">
    <h2 class="mb-4">Daftar Konsultasi</h2>

    <a href="/dokter/tambah_konsultasi" class="btn btn-primary mb-3">+ Tambah Konsultasi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Resep</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($konsultasi)) : ?>
                <?php foreach ($konsultasi as $i => $k) : ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($k['nama_pasien']) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($k['tanggal'])) ?></td>
                        <td><?= esc($k['keluhan']) ?></td>
                        <td><?= esc($k['diagnosa'] ?? '-') ?></td>
                        <td><?= esc($k['resep'] ?? '-') ?></td>
                        <td>
                            <?php if ($k['status'] == 'Selesai'): ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php elseif ($k['status'] == 'Sedang Berlangsung'): ?>
                                <span class="badge bg-info text-dark">Sedang Berlangsung</span>
                            <?php else: ?>
                                <span class="badge bg-warning">Menunggu</span>
                            <?php endif ?>
                        </td>
                        <td>
                            <a href="<?= base_url('dokter/detail_konsultasi/' . $k['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?= base_url('dokter/tanggapi_konsultasi/' . $k['id']) ?>" class="btn btn-success btn-sm">
                                <?= ($k['diagnosa'] && $k['resep']) ? 'Edit Balasan' : 'Tanggapi' ?>
                            </a>
                            <a href="<?= base_url('dokter/hapus_konsultasi/' . $k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else : ?>
                <tr><td colspan="8" class="text-center">Data belum tersedia</td></tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
