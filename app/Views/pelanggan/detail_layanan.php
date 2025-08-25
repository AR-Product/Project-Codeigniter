<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2><?= esc($layanan['nama_layanan']) ?></h2>
    <p><?= esc($layanan['deskripsi']) ?></p>
    <p>Harga: Rp <?= number_format($layanan['harga'], 0, ',', '.') ?></p>

    <a href="<?= base_url('pelanggan/layanan') ?>" class="btn btn-secondary">Kembali ke Layanan</a>
</div>

<?= $this->endSection(); ?>
