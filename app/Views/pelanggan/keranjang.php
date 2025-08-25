<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Keranjang Belanja</h2>

    <?php if (!empty($cart)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart as $id => $item) : ?>
                    <?php $subtotal = $item['harga'] * $item['qty']; ?>
                    <tr>
                        <td><?= esc($item['nama_produk']) ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= base_url('pelanggan/keranjang/hapus/' . $id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini dari keranjang?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $total += $subtotal; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                    <td colspan="2"><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
                </tr>
            </tbody>
        </table>

        <a href="<?= base_url('pelanggan/keranjang/kosongkan') ?>" class="btn btn-warning" onclick="return confirm('Kosongkan keranjang?')">Kosongkan Keranjang</a>
        <a href="<?= base_url('pelanggan/checkout') ?>" class="btn btn-success">Checkout</a>

    <?php else : ?>
        <p class="text-center">Keranjang belanja kosong.</p>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
