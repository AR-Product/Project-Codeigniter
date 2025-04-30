<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Produk</h2>
    <form action="/admin/produk/update/<?= $produk['id'] ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" value="<?= esc($produk['nama_produk']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?= esc($produk['harga']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="<?= esc($produk['stok']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-control" name="kategori" required>
                <option value="Makanan" <?= $produk['kategori'] === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                <option value="Aksesoris" <?= $produk['kategori'] === 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
                <option value="Vitamin" <?= $produk['kategori'] === 'Vitamin' ? 'selected' : '' ?>>Vitamin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required><?= esc($produk['deskripsi']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (opsional)</label><br>
            <img src="/uploads/<?= $produk['gambar'] ?>" width="100" alt="Gambar Lama"><br><br>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/produk" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
