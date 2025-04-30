<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Konsultasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar Dokter -->
    <?= $this->include('layout/navbar_dokter') ?>

    <div class="container py-4">
        <h2 class="mb-4">Riwayat Konsultasi</h2>

        <a href="/dokter/tambah_konsultasi" class="btn btn-primary">+ Tambah Konsultasi</a>


        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Resep</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($konsultasi)) : ?>
                    <?php foreach ($konsultasi as $i => $k) : ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($k['nama_pasien']) ?></td>
                            <td><?= esc($k['tanggal']) ?></td>
                            <td><?= esc($k['keluhan']) ?></td>
                            <td><?= esc($k['diagnosa']) ?></td>
                            <td><?= esc($k['resep']) ?></td>
                            <td>
                                <a href="<?= base_url('dokter/detail_konsultasi/' . $k['id']) ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="<?= base_url('dokter/edit_konsultasi/' . $k['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('dokter/hapus_konsultasi/' . $k['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr><td colspan="7" class="text-center">Data belum tersedia</td></tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
