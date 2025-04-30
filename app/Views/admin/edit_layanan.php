<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Layanan</h4>
        </div>
        <div class="card-body">
            <form action="/admin/layanan/update/<?= $layanan['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control" value="<?= esc($layanan['nama_layanan']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required><?= esc($layanan['deskripsi']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" id="harga" name="harga" class="form-control" value="<?= esc($layanan['harga']) ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/admin/layanan" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
