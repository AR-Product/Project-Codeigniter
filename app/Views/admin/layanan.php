<?= $this->extend('layoutsadmin/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h1 class="mb-4">Kelola Layanan</h1>

    <div class="mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahLayananModal">Tambah Layanan</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
<?php if (!empty($layanan)) : ?>
    <?php $no = 1; foreach ($layanan as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($row['nama_layanan']) ?></td>
            <td><?= esc($row['deskripsi']) ?></td>
            <td><?= esc($row['harga']) ?></td>
            <td>
    <a href="/admin/layanan/edit/<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="/admin/layanan/delete/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus layanan ini?')">Hapus</a>
</td>

        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr><td colspan="5" class="text-center">Belum ada layanan.</td></tr>
<?php endif; ?>
</tbody>

    </table>
</div>

<!-- Modal Tambah Layanan -->
<form action="/admin/layanan/tambah" method="post">

<div class="modal fade" id="tambahLayananModal" tabindex="-1" aria-labelledby="tambahLayananModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahLayananModalLabel">Tambah Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_layanan" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
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


