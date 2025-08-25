<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Checkout</h2>

    <form action="<?= base_url('pelanggan/checkout/proses') ?>" method="post">
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                <option value="transfer">Transfer Bank</option>
                <option value="qris">QRIS</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="metode_pengiriman" class="form-label">Metode Pengiriman</label>
            <select class="form-select" id="metode_pengiriman" name="metode_pengiriman" required>
                <option value="" disabled selected>Pilih Metode Pengiriman</option>
                <option value="gojek">Gojek</option>
                <option value="grab">Grab</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Proses Checkout</button>
        <a href="<?= base_url('pelanggan/keranjang') ?>" class="btn btn-secondary">Kembali ke Keranjang</a>
    </form>
</div>

<?= $this->endSection(); ?>
