<?= $this->extend('layout/dokter_layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Tambah Konsultasi</h1>

    <form action="/dokter/simpan" method="post">
        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea class="form-control" id="resep" name="resep" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Konsultasi</button>
        <a href="/dokter/riwayat_konsultasi" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
