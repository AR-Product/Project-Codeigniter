<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Konsultasi Dokter Hewan</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tanyakan Masalah Hewan Anda!</h5>

                    <form action="<?= base_url('pelanggan/konsultasi/kirim') ?>" method="post">
                        <div class="mb-3">
                            <label for="subjek" class="form-label">Subjek Konsultasi</label>
                            <input type="text" class="form-control" id="subjek" name="subjek" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Kirim Pertanyaan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Konsultasi Sebelumnya (opsional) -->
    <div class="mt-5">
        <h4>Riwayat Konsultasi</h4>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Kesehatan Kucing</strong> - Belum dibalas
            </li>
            <li class="list-group-item">
                <strong>Vaksinasi Anjing</strong> - Dijawab oleh drh. Budi
            </li>
        </ul>
    </div>

</div>

<?= $this->endSection(); ?>
