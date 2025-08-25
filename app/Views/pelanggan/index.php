<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Tambahkan di <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-...hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/img/bg.jpg'); background-size: cover; background-position: center;">
    <div class="container py-5 text-white text-center">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di Petshop Kami!</h1>
        <p class="lead mb-4">Tempat terbaik untuk memenuhi kebutuhan hewan kesayangan Anda!</p>
        <a href="pelanggan/produk" class="btn btn-warning btn-lg px-4 me-2">Lihat Produk</a>
        <a href="pelanggan/layanan" class="btn btn-outline-light btn-lg px-4">Layanan Kami</a>
    </div>
</section>

<!-- Info Cards -->
<section class="hero-section" style="
    background: url('/assets/img/bg dashboard.jpg') no-repeat center center;
    background-size: contain;
    background-attachment: fixed;">
<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card info-card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-primary mb-3 mx-auto">
                        <i class="fas fa-box-open fa-2x text-white"></i>
                    </div>
                    <h3 class="h5 card-title">Produk Lengkap</h3>
                    <p class="card-text">Beragam makanan, aksesoris, dan kebutuhan lainnya untuk hewan Anda.</p>
                    <a href="<?= base_url('pelanggan/produk'); ?>" class="btn btn-outline-primary stretched-link">Lihat Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card info-card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-success mb-3 mx-auto">
                        <i class="fas fa-spa fa-2x text-white"></i>
                    </div>
                    <h3 class="h5 card-title">Layanan Profesional</h3>
                    <p class="card-text">Grooming, penitipan, hingga pelatihan untuk hewan kesayangan Anda.</p>
                    <a href="<?= base_url('pelanggan/layanan'); ?>" class="btn btn-outline-success stretched-link">Lihat Layanan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card info-card h-100 border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="icon-circle bg-info mb-3 mx-auto">
                        <i class="fas fa-user-md fa-2x text-white"></i>
                    </div>
                    <h3 class="h5 card-title">Konsultasi Dokter</h3>
                    <p class="card-text">Konsultasikan kesehatan hewan Anda langsung dengan dokter hewan kami.</p>
                    <a href="<?= base_url('pelanggan/konsultasi'); ?>" class="btn btn-outline-info stretched-link">Konsultasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Produk Unggulan -->
<section class="hero-section" style="
    background: url('/assets/img/bg dashboard.jpg') no-repeat center center;
    background-size: contain;
    background-attachment: fixed;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Produk Unggulan Kami</h2>
            <p class="lead text-muted">Temukan produk terbaik untuk hewan kesayangan Anda</p>
        </div>
 <div class="row g-4">
            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/grooming.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Grooming</h3>
                        <p class="card-text">Perawatan lengkap mulai dari mandi, potong bulu, hingga perawatan kuku oleh groomer profesional.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 100.000 - 300.000</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/vet.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Konsultasi Dokter</h3>
                        <p class="card-text">Konsultasi kesehatan hewan dengan dokter hewan berpengalaman.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 50.000 - 150.000</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/boarding.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Penitipan Hewan</h3>
                        <p class="card-text">Titipkan hewan kesayangan Anda dengan aman dan nyaman saat Anda bepergian.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 75.000/hari</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</section>

<!-- Layanan Unggulan -->
<section id="layanan" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Layanan Profesional Kami</h2>
            <p class="lead text-muted">Berbagai layanan untuk merawat hewan kesayangan Anda</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/grooming.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Grooming</h3>
                        <p class="card-text">Perawatan lengkap mulai dari mandi, potong bulu, hingga perawatan kuku oleh groomer profesional.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 100.000 - 300.000</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/vet.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Konsultasi Dokter</h3>
                        <p class="card-text">Konsultasi kesehatan hewan dengan dokter hewan berpengalaman.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 50.000 - 150.000</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 border-0 shadow-sm">
                    <div class="card-img-top service-img" style="background-image: url('/assets/img/boarding.jpg');"></div>
                    <div class="card-body">
                        <h3 class="h5 card-title">Penitipan Hewan</h3>
                        <p class="card-text">Titipkan hewan kesayangan Anda dengan aman dan nyaman saat Anda bepergian.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Rp 75.000/hari</span>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="hero-section" style="
    background: url('/assets/img/bg dashboard.jpg') no-repeat center center;
    background-size: contain;
    background-attachment: fixed;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Apa Kata Pelanggan Kami?</h2>
            <p class="lead text-muted">Testimoni dari pelanggan yang puas</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card testimonial-card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex mb-3 align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=0D8ABC&color=fff&size=60" class="rounded-circle me-3" width="60" height="60" alt="Budi Santoso">
                            <div>
                                <h5 class="mb-0">Budi Santoso</h5>
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <p class="card-text">"Pelayanan grooming untuk kucing saya sangat memuaskan. Bulunya menjadi lebih lembut dan bersih. Terima kasih Petshop Kami!"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card testimonial-card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex mb-3 align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Ani+Wijaya&background=198754&color=fff&size=60" class="rounded-circle me-3" width="60" height="60" alt="Ani Wijaya">
                            <div>
                                <h5 class="mb-0">Ani Wijaya</h5>
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                            </div>
                        </div>
                        <p class="card-text">"Makanan anjing yang saya beli disini sangat berkualitas. Anjing saya sangat menyukainya dan kesehatannya terjaga."</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card testimonial-card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex mb-3 align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Rudi+Hartono&background=FFC107&color=000&size=60" class="rounded-circle me-3" width="60" height="60" alt="Rudi Hartono">
                            <div>
                                <h5 class="mb-0">Rudi Hartono</h5>
                                <span class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            </div>
                        </div>
                        <p class="card-text">"Dokter hewannya sangat ramah dan berpengalaman. Saya puas dengan konsultasi yang diberikan untuk kucing saya."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Newsletter -->
<section class="py-5" style="background-color: #ffc107;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">Dapatkan Promo Menarik!</h3>
                <p class="mb-0">Berlangganan newsletter kami untuk mendapatkan informasi promo dan produk terbaru.</p>
            </div>
            <div class="col-md-6">
                <form class="row g-2">
                    <div class="col-8">
                        <input type="email" class="form-control" placeholder="Alamat Email Anda">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-warning w-100">Berlangganan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hero Section */
    .hero-section {
        padding: 100px 0;
        margin-bottom: 50px;
    }
    
    /* Info Cards */
    .info-card {
        transition: transform 0.3s;
        border-radius: 15px;
    }
    
    .info-card:hover {
        transform: translateY(-10px);
    }
    
    .icon-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Product Cards */
    .product-card {
        transition: all 0.3s;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Service Cards */
    .service-card {
        transition: all 0.3s;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .service-img {
        height: 200px;
        background-size: cover;
        background-position: center;
    }
    
    /* Testimonial Cards */
    .testimonial-card {
        transition: all 0.3s;
        border-radius: 12px;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 60px 0;
        }
        
        .hero-section h1 {
            font-size: 2.5rem;
        }
    }
</style>

<?= $this->endSection(); ?>