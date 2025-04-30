<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Layanan Kami</h2>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Grooming Hewan</h5>
                    <p class="card-text">Perawatan dan kebersihan hewan kesayangan Anda dengan tenaga profesional.</p>
                    <a href="#" class="btn btn-success btn-sm">Info Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Pet Hotel</h5>
                    <p class="card-text">Tempat penitipan hewan yang nyaman dan aman saat Anda bepergian.</p>
                    <a href="#" class="btn btn-success btn-sm">Info Selengkapnya</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <h5 class="card-title">Training Hewan</h5>
                    <p class="card-text">Pelatihan untuk anjing dan kucing agar lebih disiplin dan sehat secara mental.</p>
                    <a href="#" class="btn btn-success btn-sm">Info Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
