<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <!-- Welcome Message -->
    <div class="text-center mb-5">
        <h1>Selamat Datang di Petshop Kami!</h1>
        <p class="lead">Tempat terbaik untuk memenuhi kebutuhan hewan kesayangan Anda!</p>
    </div>

    <!-- Info Cards -->
    <div class="row text-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text">Beragam makanan, aksesoris, dan kebutuhan lainnya untuk hewan Anda.</p>
                    <a href="<?= base_url('pelanggan/produk'); ?>" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Layanan</h5>
                    <p class="card-text">Grooming, penitipan, hingga pelatihan profesional untuk hewan kesayangan Anda.</p>
                    <a href="<?= base_url('pelanggan/layanan'); ?>" class="btn btn-success">Lihat Layanan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Konsultasi</h5>
                    <p class="card-text">Bingung soal kesehatan hewan Anda? Konsultasikan langsung dengan dokter hewan kami!</p>
                    <a href="<?= base_url('pelanggan/konsultasi'); ?>" class="btn btn-warning">Konsultasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="alert alert-info text-center" role="alert">
                🎉 Promo Akhir Tahun! Diskon hingga 30% untuk semua produk makanan hewan! 🎉
            </div>
        </div>
    </div>

    <!-- Highlight Produk -->
    <h2 class="mt-5 mb-4 text-center">Produk Populer</h2>
    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="/assets/img/produk1.jpg" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Makanan Anjing Premium</h5>
                    <p class="card-text">Rp 120.000</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="/assets/img/produk2.jpg" class="card-img-top" alt="Produk 2">
                <div class="card-body">
                    <h5 class="card-title">Kandang Kucing Nyaman</h5>
                    <p class="card-text">Rp 250.000</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="/assets/img/produk3.jpg" class="card-img-top" alt="Produk 3">
                <div class="card-body">
                    <h5 class="card-title">Vitamin Hewan</h5>
                    <p class="card-text">Rp 75.000</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="/assets/img/produk4.jpg" class="card-img-top" alt="Produk 4">
                <div class="card-body">
                    <h5 class="card-title">Mainan Kucing Lucu</h5>
                    <p class="card-text">Rp 35.000</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
