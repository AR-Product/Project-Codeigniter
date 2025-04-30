<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="mb-4">Kelola Konsultasi</h2>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>

    <!-- Tabel Konsultasi -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Hewan</th>
                    <th>Keluhan</th>
                    <th>Waktu Konsultasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($konsultasi)) : ?>
                    <?php $no = 1; foreach ($konsultasi as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama_pelanggan']) ?></td>
                            <td><?= esc($row['jenis_hewan']) ?></td>
                            <td><?= esc($row['keluhan']) ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($row['waktu_konsultasi'])) ?></td>
                            <td>
                                <?php if ($row['status'] == 'pending') : ?>
                                    <span class="badge bg-warning">Menunggu</span>
                                <?php elseif ($row['status'] == 'selesai') : ?>
                                    <span class="badge bg-success">Selesai</span>
                                <?php else : ?>
                                    <span class="badge bg-secondary"><?= esc($row['status']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/konsultasi/detail/<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                                <a href="/admin/konsultasi/hapus/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data konsultasi ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data konsultasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

untuk tampilan kelola layanan sudah berhasil, tinggal yang terakhir bantu saya membuatkan halaman konsultasi
