<?= $this->extend('layout/navbar_dokter') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <h2 class="mb-4 border-bottom pb-2">Tanggapi Konsultasi</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (isset($konsultasi)): ?>
        <form action="<?= base_url('dokter/simpanTanggapan/' . $konsultasi['id']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label class="form-label">Nama Pasien</label>
                <input type="text" class="form-control bg-light" value="<?= esc($konsultasi['nama_pasien'] ?? '-') ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Keluhan</label>
                <textarea class="form-control bg-light" rows="3" readonly><?= esc($konsultasi['keluhan']) ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnosa</label>
                <textarea name="diagnosa" class="form-control" rows="5" required><?= esc($konsultasi['diagnosa'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Resep</label>
                <textarea name="resep" class="form-control" rows="5" required><?= esc($konsultasi['resep'] ?? '') ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Pending" <?= ($konsultasi['status'] ?? 'Pending') == 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Sedang Berlangsung" <?= ($konsultasi['status'] ?? 'Pending') == 'Sedang Berlangsung' ? 'selected' : '' ?>>Sedang Berlangsung</option>
                    <option value="Selesai" <?= ($konsultasi['status'] ?? 'Pending') == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('dokter/riwayat_konsultasi') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Tanggapan</button>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-warning">Data konsultasi tidak ditemukan.</div>
        <a href="<?= base_url('dokter/riwayat_konsultasi') ?>" class="btn btn-secondary mt-2">Kembali</a>
    <?php endif; ?>
</div>

<style>
    .form-control:read-only, 
    .form-control[readonly] {
        background-color: #f8f9fa;
    }
    
    textarea.form-control {
        min-height: 120px;
    }
    
    .border-bottom {
        border-color: #dee2e6 !important;
    }
</style>

<?= $this->endSection() ?>