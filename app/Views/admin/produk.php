<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Kelola Produk</h1>

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

    <!-- Tombol Tambah Produk -->
    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
            Tambah Produk
        </button>
    </div>

    <!-- Form Pencarian -->
    <form method="get" action="/admin/produk" class="row mb-3">
        <div class="col-md-3">
            <select name="kategori" class="form-select">
                <option value="nama_produk" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'nama_produk') ? 'selected' : '' ?>>Nama Produk</option>
                <option value="stok" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'stok') ? 'selected' : '' ?>>Stok</option>
            </select>
        </div>
        <div class="col-md-5">
            <input type="text" name="keyword" class="form-control" placeholder="Cari..." value="<?= esc($_GET['keyword'] ?? '') ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </div>
        <div class="col-md-2">
            <a href="/admin/produk" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <!-- Tabel Produk -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produk)) : ?>
                <?php $no = 1; foreach ($produk as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="/uploads/<?= esc($row['gambar']) ?>" alt="Produk" width="60"></td>
                        <td><?= esc($row['nama_produk']) ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td><?= esc($row['stok']) ?></td>
                        <td><?= esc($row['kategori']) ?></td>
                        <td><?= esc($row['deskripsi']) ?></td>
                        <td>
                            <a href="/admin/produk/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/admin/produk/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada produk.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/admin/produk/tambah" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
              <option value="Makanan">Makanan</option>
              <option value="Aksesoris">Aksesoris</option>
              <option value="Vitamin">Vitamin</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
