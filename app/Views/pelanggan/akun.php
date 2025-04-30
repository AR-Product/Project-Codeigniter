<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Pengaturan Akun</h2>

    <div class="container mt-5">
    <div class="row">
        <!-- Update Profil -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Profil</div>
                <div class="card-body">
                    <form action="<?= base_url('/pelanggan/updateProfil') ?>" method="post">
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= session()->get('nama'); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= session()->get('email'); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="<?= session()->get('telepon'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Ubah Password</div>
                <div class="card-body">
                    <form action="<?= base_url('/pelanggan/ubahPassword') ?>" method="post">
                        <div class="form-group mb-3">
                            <label>Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilkan Flashdata -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger mt-3"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>
</div>


<?= $this->endSection(); ?>
