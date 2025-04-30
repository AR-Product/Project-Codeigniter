<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar Dokter -->
    <?= view('layout/navbar_dokter') ?>

    <!-- Konten Dashboard -->
    <div class="container mt-5">
        <h2 class="text-center mb-5">Selamat Datang Dokter🩺</h2>

        <div class="row g-4">
            <!-- Total Pasien -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Pasien</h5>
                        <p class="display-6 text-primary fw-bold"><?= $total_pasien ?></p>
                    </div>
                </div>
            </div>

            <!-- Jumlah Konsultasi -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jumlah Konsultasi</h5>
                        <p class="display-6 text-success fw-bold"><?= $jumlah_konsultasi ?></p>
                    </div>
                </div>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jadwal Hari Ini</h5>
                        <p class="display-6 text-danger fw-bold"><?= $jadwal_hari_ini ?></p>
                    </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
