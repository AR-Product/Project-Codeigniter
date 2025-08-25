<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pesanan</h3>
                    <div class="card-tools">
                        
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pesanan)) : ?>
                                <?php foreach ($pesanan as $order) : ?>
                                    <tr>
                                        <td>#<?= $order['id'] ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($order['tanggal_pesanan'])) ?></td>
                                        <td><?= $order['nama_pelanggan'] ?? $order['username'] ?></td>
                                        <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/pesanan/detail/' . $order['id']) ?>" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada pesanan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            }
        });
    });
</script>
<?= $this->endSection() ?>