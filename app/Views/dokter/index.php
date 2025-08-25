<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .icon-background {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 3rem;
            opacity: 0.1;
            z-index: 0;
        }
        
        .stat-card {
            transition: transform 0.2s;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .card-body {
            position: relative;
            z-index: 1;
        }
        
        .page-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        /* Style untuk tabel konsultasi */
        .consultation-table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .consultation-table thead th {
            background-color: #f8f9fa;
            border-bottom-width: 1px;
            font-weight: 600;
        }
        
        .consultation-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        .badge-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .badge-completed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .badge-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        /* Grafik aktivitas */
        .activity-chart-container {
            position: relative;
            height: 250px;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar Dokter -->
    <?= view('layout/navbar_dokter') ?>

    <!-- Konten Dashboard -->
    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-4 page-header">
            <h1 class="h2"><i class="fas fa-user-md me-2"></i>Dashboard Dokter</h1>
        </div>

        <div class="row">
            <!-- Total Pasien Card -->
            <!-- Total Pasien Card -->
<div class="col-md-4 mb-4">
    <div class="card stat-card h-100 position-relative overflow-hidden">
        <div class="card-body text-center">
            <i class="fas fa-users icon-background"></i>
            <h5 class="card-title">Total Pasien</h5>
            <p class="card-text display-6"><?= $total_pasien ?></p>
            <small class="text-dark"><?= $total_pasien > 0 ? '+'.rand(1,3).' baru minggu ini' : 'Belum ada pasien' ?></small>
        </div>
    </div>
</div>

<!-- Jumlah Konsultasi Card -->
<div class="col-md-4 mb-4">
    <div class="card stat-card h-100 position-relative overflow-hidden">
        <div class="card-body text-center">
            <i class="fas fa-comments icon-background"></i>
            <h5 class="card-title">Jumlah Konsultasi</h5>
            <p class="card-text display-6"><?= $jumlah_konsultasi ?></p>
            <small class="text-dark"><?= $belum_ditangani ?> belum ditangani</small>
        </div>
    </div>
</div>

<!-- Jadwal Hari Ini Card -->
<div class="col-md-4 mb-4">
    <div class="card stat-card h-100 position-relative overflow-hidden">
        <div class="card-body text-center">
            <i class="fas fa-calendar-alt icon-background"></i>
            <h5 class="card-title">Jadwal Hari Ini</h5>
            <p class="card-text display-6"><?= $jadwal_hari_ini ?></p>
            <small class="text-dark"><?= $jadwal_hari_ini > 0 ? 'Jadwal konsultasi' : 'Tidak ada jadwal' ?></small>
        </div>
    </div>
</div>

       <!-- Ganti bagian tabel konsultasi terbaru dengan ini -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Konsultasi Terbaru</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
    <table class="table consultation-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($konsultasi_terbaru)): ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada konsultasi terbaru</td>
                </tr>
            <?php else: ?>
                <?php foreach ($konsultasi_terbaru as $index => $konsultasi): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= esc($konsultasi['nama_pasien'] ?? '-') ?></td>
                    <td><?= esc($konsultasi['keluhan']) ?></td>
                    <td><?= date('d-m-Y', strtotime($konsultasi['tanggal'])) ?></td>
                    <td>
                        <span class="badge <?= ($konsultasi['status'] == 'Selesai') ? 'badge-completed' : 'badge-pending' ?> badge-status">
                            <?= $konsultasi['status'] ?? 'Pending' ?>
                        </span>
                    </td>
                    <td>
                        <?php if (empty($konsultasi['status']) || $konsultasi['status'] == 'Pending'): ?>
                            <a href="<?= base_url('dokter/tanggapi_konsultasi/'.$konsultasi['id']) ?>" class="btn btn-sm btn-primary">Tangani</a>
                        <?php else: ?>
                            <button class="btn btn-sm btn-secondary" disabled>Sudah Ditangani</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Aktivitas Konsultasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="activity-chart-container">
                            <canvas id="consultationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik aktivitas konsultasi
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('consultationChart').getContext('2d');
            const consultationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Konsultasi',
                        data: [12, 19, 8, 15, 14, 17, 10, 15, 12, 18, 14, 16],
                        backgroundColor: 'rgba(52, 152, 219, 0.7)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>