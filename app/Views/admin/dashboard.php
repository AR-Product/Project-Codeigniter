<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card shadow-sm text-white bg-primary h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-box-seam" style="font-size: 2.5rem;"></i>
                </div>
                <div>
                    <h5 class="card-title">Total Produk</h5>
                    <p class="card-text fs-4"><?= $totalProduk ?? 0 ?> Produk</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-white bg-success h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-gear-wide-connected" style="font-size: 2.5rem;"></i>
                </div>
                <div>
                    <h5 class="card-title">Total Layanan</h5>
                    <p class="card-text fs-4"><?= $totalLayanan ?? 0 ?> Layanan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-white bg-warning h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-chat-dots" style="font-size: 2.5rem;"></i>
                </div>
                <div>
                    <h5 class="card-title">Konsultasi Aktif</h5>
                    <p class="card-text fs-4"><?= $totalKonsultasi ?? 0 ?> Konsultasi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-white bg-info h-100">
            <div class="card-body d-flex align-items-center">
                <div class="me-3">
                    <i class="bi bi-people" style="font-size: 2.5rem;"></i>
                </div>
                <div>
                    <h5 class="card-title">Total Pengguna Akun</h5>
                    <p class="card-text fs-4"><?= $totalAkun ?? 0 ?> Akun</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
