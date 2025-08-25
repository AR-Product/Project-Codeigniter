<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Layanan Kami</h2>

    <div class="row">
        <?php if (!empty($layanan)) : ?>
            <?php foreach ($layanan as $l) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($l['nama_layanan']) ?></h5>
                            <p class="card-text"><?= esc($l['deskripsi']) ?></p>
                            <a href="<?= base_url('pelanggan/layanan/' . $l['id']) ?>" class="btn btn-success btn-sm">Info Selengkapnya</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">Belum ada layanan tersedia.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
