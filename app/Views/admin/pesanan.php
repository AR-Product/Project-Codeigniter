z<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Kelola Pesanan</h1>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="/admin/pesanan">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status Pesanan</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending" <?= (isset($_GET['status']) && $_GET['status'] == 'pending') ? 'selected' : '' ?>>Pending</option>
                            <option value="diproses" <?= (isset($_GET['status']) && $_GET['status'] == 'diproses') ? 'selected' : '' ?>>Diproses</option>
                            <option value="dikirim" <?= (isset($_GET['status']) && $_GET['status'] == 'dikirim') ? 'selected' : '' ?>>Dikirim</option>
                            <option value="selesai" <?= (isset($_GET['status']) && $_GET['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                            <option value="dibatalkan" <?= (isset($_GET['status']) && $_GET['status'] == 'dibatalkan') ? 'selected' : '' ?>>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal" class="form-label">Tanggal Pesanan</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= esc($_GET['tanggal'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="search" class="form-label">Cari (No. Pesanan/Nama)</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="No. Pesanan/Nama Pelanggan" value="<?= esc($_GET['search'] ?? '') ?>">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                        <a href="/admin/pesanan" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
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
                                    <td><?= esc($order['nama_pelanggan']) ?></td>
                                    <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
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
                                    <td>
                                        <a href="/admin/pesanan/detail/<?= $order['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ubah Status
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/admin/pesanan/update-status/<?= $order['id'] ?>/diproses">Diproses</a></li>
                                                <li><a class="dropdown-item" href="/admin/pesanan/update-status/<?= $order['id'] ?>/dikirim">Dikirim</a></li>
                                                <li><a class="dropdown-item" href="/admin/pesanan/update-status/<?= $order['id'] ?>/selesai">Selesai</a></li>
                                                <li><a class="dropdown-item" href="/admin/pesanan/update-status/<?= $order['id'] ?>/dibatalkan">Batalkan</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pesanan ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($pager) : ?>
                <div class="d-flex justify-content-end mt-3">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal for Order Detail -->
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailModalLabel">Detail Pesanan #<span id="orderId"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="orderDetailContent">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="printOrderBtn">Cetak</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>