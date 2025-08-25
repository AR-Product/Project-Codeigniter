<?= $this->extend('layoutsadmin/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <!-- Header berwarna kuning -->
        <div class="card-header text-dark" style="background-color: #ffc107;">
            <h4>
                <i class="fas fa-clipboard-list me-2" style="color:rgb(0, 0, 0);  border-radius:50%; padding:6px;"></i>
                Detail Konsultasi
            </h4>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6 class="text-muted">
                            <i class="fas fa-user me-2" style="color:rgb(0, 0, 0);"></i> Nama Pasien
                        </h6>
                        <p class="fs-5 fw-semibold"><?= esc($konsultasi['nama_pasien']) ?></p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">
                            <i class="fas fa-paw me-2" style="color:rgb(0, 0, 0);"></i> Jenis Hewan
                        </h6>
                        <p><?= esc($konsultasi['subjek']) ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <h6 class="text-muted">
                            <i class="fas fa-calendar-alt me-2" style="color:rgb(0, 0, 0);"></i> Waktu Konsultasi
                        </h6>
                        <p>
                            <i class="far fa-clock text-secondary me-1"></i><?= date('d F Y H:i', strtotime($konsultasi['tanggal'])) ?>
                        </p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">
                            <i class="fas fa-info-circle me-2" style="color:rgb(0, 0, 0);"></i> Status
                        </h6>
                        <p>
                            <?php if (strtolower($konsultasi['status']) === 'menunggu') : ?>
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Menunggu</span>
                            <?php elseif (strtolower($konsultasi['status']) === 'selesai') : ?>
                                <span class="badge bg-success text-white px-3 py-2 rounded-pill">Selesai</span>
                            <?php else : ?>
                                <span class="badge bg-secondary px-3 py-2 rounded-pill"><?= esc($konsultasi['status']) ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Keluhan -->
            <div class="mb-4">
                <h6 class="text-muted">
                    <i class="fas fa-comment-medical me-2" style="color:rgb(0, 0, 0);"></i> Keluhan
                </h6>
                <div class="p-3 bg-light border rounded">
                    <?= nl2br(esc($konsultasi['keluhan'])) ?>
                </div>
            </div>

            <!-- Tombol -->
            <a href="/admin/konsultasi" class="btn btn-secondary rounded-pill">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            
        </div>
    </div>
</div>

<?= $this->endSection() ?>
