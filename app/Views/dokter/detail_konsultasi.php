<?= $this->extend('layout/dokter_layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2>Detail Konsultasi</h2>

    <div class="card p-3 mb-3">
        <p><strong>Nama Pasien:</strong> <?= esc($konsultasi['nama_pasien']) ?></p>
        <p><strong>Subjek:</strong> <?= esc($konsultasi['subjek']) ?></p>
        <p><strong>Keluhan:</strong><br><?= esc($konsultasi['keluhan']) ?></p>
        <p><strong>Status:</strong> <?= esc($konsultasi['status']) ?></p>
    </div>

    <form action="<?= base_url('dokter/konsultasi/' . $konsultasi['id'] . '/balas') ?>" method="post">
        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea class="form-control" name="diagnosa" rows="3" required><?= esc($konsultasi['diagnosa'] ?? '') ?></textarea>
        </div>
        <div class="mb-3">
            <label for="resep" class="form-label">Resep / Saran</label>
            <textarea class="form-control" name="resep" rows="3"><?= esc($konsultasi['resep'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
        <a href="<?= base_url('dokter/konsultasi') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>
