<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="mb-4">Kelola Konsultasi</h2>

    <!-- Flash Message -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
<?php endif; ?>

<!-- Form Tambah Konsultasi -->
<form action="/admin/konsultasi/simpan" method="post" class="mb-4">
    <div class="row g-3">
        <div class="col-md-3">
            <!-- Dropdown user, mewakili pasien -->
            <select name="user_id" class="form-select" required>
                <option value="">Pilih Pasien (User)</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>">
                        <?= esc($user['username']) ?> (<?= esc($user['email']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="subjek" class="form-control" placeholder="Jenis Hewan/Subjek" required>
        </div>
        <div class="col-md-4">
            <textarea name="keluhan" class="form-control" placeholder="Keluhan" required></textarea>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tambah</button>
        </div>
    </div>
</form>

<!-- Tabel Konsultasi -->
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Hewan</th>
                <th>Keluhan</th>
                <th>Waktu Konsultasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($konsultasi)) : ?>
                <?php $no = 1; foreach ($konsultasi as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_pasien']) ?></td>
                        <td><?= esc($row['subjek']) ?></td>
                        <td><?= esc($row['keluhan']) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($row['tanggal'])) ?></td>
                        <td>
                            <?php if ($row['status'] == 'pending' || $row['status'] == 'Menunggu') : ?>
                                <span class="badge bg-warning">Menunggu</span>
                            <?php elseif ($row['status'] == 'selesai' || $row['status'] == 'Selesai') : ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php else : ?>
                                <span class="badge bg-secondary"><?= esc($row['status']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                          <a href="/admin/konsultasi/detail/<?= $row['id'] ?>" class="btn btn-sm btn-info">
    <i class="fas fa-eye"></i> Detail
</a>

                            <a href="/admin/konsultasi/hapus/<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data konsultasi ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada data konsultasi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('.btn-detail').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function(data) {
            $('#detailKonsultasiModal').remove(); // Hapus jika ada sebelumnya
            $('body').append(data); // Sisipkan hasil response (modal)
            var modal = new bootstrap.Modal(document.getElementById('detailKonsultasiModal'));
            modal.show();
        }).fail(function() {
            alert('Gagal memuat detail konsultasi');
        });
    });
});
</script>


<?= $this->endSection() ?>
<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>
<!-- Konten Anda -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>