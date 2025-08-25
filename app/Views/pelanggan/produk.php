<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-4">
    <!-- Page Header -->
    <div class="page-header text-center mb-5">
        <h1 class="display-5 fw-bold">Daftar Produk Kami</h1>
        <p class="lead text-muted">Temukan berbagai kebutuhan hewan peliharaan Anda</p>
    </div>

    <!-- Product Grid -->
    <div class="row g-4">
        <?php if (!empty($produk)) : ?>
            <?php foreach ($produk as $p) : ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <!-- Product Image -->
                        <div class="product-image-container">
                            <img src="/uploads/<?= esc($p['gambar']) ?>" class="card-img-top" alt="<?= esc($p['nama_produk']) ?>">
                            <?php if($p['harga'] > 500000) : ?>
                                <span class="product-badge bg-danger">Premium</span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Product Body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0"><?= esc($p['nama_produk']) ?></h5>
                                <?php if(isset($p['kategori'])) : ?>
                                    <span class="badge bg-light text-dark"><?= esc($p['kategori']) ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <p class="text-muted small mb-2"><?= esc($p['deskripsi'] ?? '') ?></p>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="h5 text-primary fw-bold">Rp <?= number_format($p['harga'], 0, ',', '.') ?></span>
                                <?php if($p['stok'] > 0) : ?>
                                    <span class="badge bg-success bg-opacity-10 text-success small">Tersedia</span>
                                <?php else : ?>
                                    <span class="badge bg-danger bg-opacity-10 text-danger small">Habis</span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Add to Cart Form -->
                            <form action="<?= base_url('pelanggan/keranjang/tambah') ?>" method="post">
                                <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
                                <input type="hidden" name="nama_produk" value="<?= esc($p['nama_produk']) ?>">
                                <input type="hidden" name="harga" value="<?= $p['harga'] ?>">
                                
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                    <input type="number" name="quantity" value="1" min="1" max="<?= $p['stok'] ?? 10 ?>" 
                                           class="form-control text-center quantity-input">
                                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100" <?= ($p['stok'] ?? 0) <= 0 ? 'disabled' : '' ?>>
                                    <i class="fas fa-cart-plus me-2"></i>Tambah ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <img src="/assets/img/empty-product.svg" alt="No products" class="img-fluid mb-4" style="max-height: 200px;">
                    <h5 class="text-muted">Belum ada produk tersedia</h5>
                    <p class="text-muted">Silakan kembali lagi nanti</p>
                    <a href="<?= base_url('/') ?>" class="btn btn-outline-primary">Kembali ke Beranda</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .product-image-container {
        position: relative;
        overflow: hidden;
        height: 200px;
    }
    
    .product-image-container img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-image-container img {
        transform: scale(1.05);
    }
    
    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        color: white;
    }
    
    .quantity-input {
        max-width: 50px;
        text-align: center;
    }
    
    .minus-btn, .plus-btn {
        width: 40px;
    }
    
    .page-header {
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity buttons functionality
        document.querySelectorAll('.minus-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.nextElementSibling;
                if (parseInt(input.value) > parseInt(input.min)) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
        
        document.querySelectorAll('.plus-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (parseInt(input.value) < parseInt(input.max)) {
                    input.value = parseInt(input.value) + 1;
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>