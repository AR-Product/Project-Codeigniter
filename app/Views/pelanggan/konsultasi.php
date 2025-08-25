<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Konsultasi Dokter Hewan</h2>

    <!-- Form Konsultasi -->
    <div class="card mb-4 p-3">
        <form action="<?= base_url('pelanggan/konsultasi/kirim') ?>" method="post">
            
            <div class="mb-3">
                <label for="subjek" class="form-label">Subjek Konsultasi</label>
                <input type="text" class="form-control" id="subjek" name="subjek" required>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Kirim Pertanyaan</button>
        </form>
    </div>

    <h3>Riwayat Konsultasi Anda</h3>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:green"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if (!empty($riwayat)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Subjek</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th>Diagnosa Dokter</th>
                    <th>Resep / Saran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayat as $row): ?>
                <tr>
                    <td><?= esc($row['tanggal']) ?></td>
                    <td><?= esc($row['nama_pasien'] ?? '-') ?></td>

                    <td><?= esc($row['subjek']) ?></td>
                    <td><?= esc($row['keluhan']) ?></td>
                    <td>
                        <span class="badge bg-<?= $row['status'] == 'Menunggu' ? 'warning' : 'success' ?>">
                            <?= esc($row['status']) ?>
                        </span>
                    </td>
                    <td><?= esc($row['diagnosa'] ?? '-') ?></td>
                    <td><?= esc($row['resep'] ?? '-') ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Belum ada riwayat konsultasi.</div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
