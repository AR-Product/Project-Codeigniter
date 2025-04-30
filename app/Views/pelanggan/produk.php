<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Produk Kami</h2>

    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="/assets/img/produk<?= $i ?>.jpg" class="card-img-top" alt="Produk <?= $i ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title">Produk <?= $i ?></h5>
                        <p class="card-text">Rp <?= number_format(rand(50000, 300000), 0, ',', '.'); ?></p>
                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

</div>

<?= $this->endSection(); ?>
