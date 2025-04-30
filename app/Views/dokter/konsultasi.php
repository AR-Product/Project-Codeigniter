<?= $this->extend('layout/dokter_layout'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Konsultasi Masuk</h2>
    
    <?php if (isset($konsultasi) && count($konsultasi) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Topik</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($konsultasi as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($row['nama_user']) ?></td>
                            <td><?= esc($row['judul']) ?></td>
                            <td><?= esc($row['pesan']) ?></td>
                            <td>
                                <span class="badge bg-<?= $row['status'] === 'Menunggu' ? 'secondary' : ($row['status'] === 'Diterima' ? 'success' : 'danger') ?>">
                                    <?= esc($row['status']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('dokter/konsultasi/' . $row['id']) ?>" class="btn btn-sm btn-primary">Tanggapi</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">Belum ada data konsultasi.</div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
