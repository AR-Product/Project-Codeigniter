<?= $this->extend('layoutdokter') ?>
<?= $this->section('content') ?>

<h3>Verifikasi & Balasan Konsultasi</h3>
<form action="/dokter/konsultasi/update/<?= $konsultasi['id'] ?>" method="post">
    <div>
        <label>Diagnosa:</label>
        <textarea name="diagnosa" class="form-control"><?= $konsultasi['diagnosa'] ?? '' ?></textarea>
    </div>
    <div>
        <label>Resep:</label>
        <textarea name="resep" class="form-control"><?= $konsultasi['resep'] ?? '' ?></textarea>
    </div>
    <div>
        <label>Status:</label>
        <select name="status" class="form-select">
            <option <?= $konsultasi['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option <?= $konsultasi['status'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
            <option <?= $konsultasi['status'] == 'Sedang Berlangsung' ? 'selected' : '' ?>>Sedang Berlangsung</option>
            <option <?= $konsultasi['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-3">Simpan</button>
</form>

<?= $this->endSection() ?>
