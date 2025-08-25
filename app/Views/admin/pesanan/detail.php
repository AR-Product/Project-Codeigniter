<div class="row">
    <div class="col-md-6">
        <h6>Informasi Pesanan</h6>
        <table class="table table-sm">
            <tr>
                <th>No. Pesanan</th>
                <td>#<?= $order['id'] ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= date('d/m/Y H:i', strtotime($order['tanggal_pesanan'])) ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="badge 
                        <?= $order['status'] == 'pending' ? 'bg-warning' : '' ?>
                        <?= $order['status'] == 'diproses' ? 'bg-info' : '' ?>
                        <?= $order['status'] == 'dikirim' ? 'bg-primary' : '' ?>
                        <?= $order['status'] == 'selesai' ? 'bg-success' : '' ?>
                        <?= $order['status'] == 'dibatalkan' ? 'bg-danger' : '' ?>
                    ">
                        <?= ucfirst($order['status']) ?>
                    </span>
                </td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td><?= esc($order['metode_pembayaran']) ?></td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td><?= $order['status_pembayaran'] ? 'Lunas' : 'Belum Lunas' ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <h6>Informasi Pelanggan</h6>
        <table class="table table-sm">
            <tr>
                <th>Nama</th>
                <td><?= esc($order['nama_pelanggan']) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= esc($order['email_pelanggan']) ?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?= esc($order['telepon_pelanggan']) ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?= esc($order['alamat_pengiriman']) ?></td>
            </tr>
        </table>
    </div>
</div>

<h6 class="mt-4">Produk yang Dipesan</h6>
<table class="table table-sm">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($order['items'] as $item) : ?>
            <tr>
                <td><?= esc($item['nama_produk']) ?></td>
                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>Rp <?= number_format($item['harga'] * $item['quantity'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></th>
        </tr>
    </tfoot>
</table>

<?php if (!empty($order['catatan'])) : ?>
    <h6>Catatan Pesanan</h6>
    <div class="alert alert-light">
        <?= esc($order['catatan']) ?>
    </div>
<?php endif; ?>