<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5 text-center">
    <h2>Terima kasih telah melakukan pemesanan!</h2>
    <p>Silakan lakukan pembayaran sesuai metode yang dipilih dan tunggu pengiriman melalui layanan yang dipilih.</p>
    <a href="<?= base_url('pelanggan/produk') ?>" class="btn btn-primary">Kembali ke Produk</a>
</div>

<?= $this->endSection(); ?>
