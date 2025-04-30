<?= $this->extend('layoutsadmin/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Kelola Akun</h1>

    <div class="mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAkunModal">Tambah Akun</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php if (!empty($akun)) : ?>
    <?php $no = 1; foreach ($akun as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($row['username']) ?></td>
            <td><?= esc($row['email']) ?></td>
            <td><?= esc($row['role']) ?></td>
            <td>
                <a href="/admin/akun/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/admin/akun/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus akun ini?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr><td colspan="5" class="text-center">Belum ada akun.</td></tr>
<?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Akun -->
<form action="/admin/akun/tambah" method="post">
  <div class="modal fade" id="tambahAkunModal" tabindex="-1" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahAkunModalLabel">Tambah Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
              <option value="" disabled selected>Pilih Role</option>
              <option value="pelanggan">Pelanggan</option>
              <option value="admin">Admin</option>
              <option value="dokter">Dokter</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>


<?= $this->endSection() ?>
