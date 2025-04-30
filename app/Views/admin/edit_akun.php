<?= $this->extend('layoutsadmin/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1>Edit Akun</h1>

    <form action="/admin/akun/update/<?= $akun['id'] ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($akun['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($akun['email']) ?>" required>
        </div>
        <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select class="form-select" id="role" name="role" required>
        <option value="pelanggan" <?= $akun['role'] == 'pelanggan' ? 'selected' : '' ?>>Pelanggan</option>
        <option value="admin" <?= $akun['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="dokter" <?= $akun['role'] == 'dokter' ? 'selected' : '' ?>>Dokter</option>
    </select>
</div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="/admin/akun" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
