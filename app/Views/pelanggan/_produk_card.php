<div class="col-xl-3 col-lg-4 col-md-6 col-6">
    <div class="card product-card h-100 border-0 shadow-sm">
        <div class="product-image-container">
            <img src="/uploads/<?= esc($p['gambar']) ?>" class="card-img-top" alt="<?= esc($p['nama_produk']) ?>">
            <?php if($p['harga'] > 500000) : ?>
                <span class="product-badge bg-danger">Premium</span>
            <?php endif; ?>
        </div>
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

            <form action="<?= base_url('pelanggan/keranjang/tambah') ?>" method="post">
                <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
                <input type="hidden" name="nama_produk" value="<?= esc($p['nama_produk']) ?>">
                <input type="hidden" name="harga" value="<?= $p['harga'] ?>">

                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                    <input type="number" name="quantity" value="1" min="1" max="<?= $p['stok'] ?? 10 ?>" class="form-control text-center quantity-input">
                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                </div>

                <button type="submit" class="btn btn-primary w-100" <?= ($p['stok'] ?? 0) <= 0 ? 'disabled' : '' ?>>
                    <i class="fas fa-cart-plus me-2"></i>Tambah ke Keranjang
                </button>
            </form>
        </div>
    </div>
</div>
