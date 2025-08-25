<?= $this->extend('layoutsadmin/admin') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 mb-4 page-header">
    <h1 class="h2"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
</div>

<div class="row">
    <!-- Total Produk Card -->
    <div class="col-md-3 mb-4">
        <a href="/admin/produk" class="text-decoration-none">
            <div class="card stat-card h-100 position-relative overflow-hidden">
                <div class="card-body text-center">
                    <i class="fas fa-box icon-background"></i>
                    <h5 class="card-title">Total Produk</h5>
                    <p class="card-text display-6"><?= $total_produk ?></p>
                    <small class="text-dark"><?= $total_produk > 0 ? '+'.rand(1,5).' baru minggu ini' : 'Belum ada produk' ?></small>
                </div>
            </div>
        </a>
    </div>
    
    <!-- Total Layanan Card -->
    <div class="col-md-3 mb-4">
        <a href="/admin/layanan" class="text-decoration-none">
            <div class="card stat-card h-100 position-relative overflow-hidden">
                <div class="card-body text-center">
                    <i class="fas fa-concierge-bell icon-background"></i>
                    <h5 class="card-title">Total Layanan</h5>
                    <p class="card-text display-6"><?= $total_layanan ?></p>
                    <small class="text-dark"><?= $total_layanan > 0 ? 'Tersedia' : 'Belum ada layanan' ?></small>
                </div>
            </div>
        </a>
    </div>
    
    <!-- Konsultasi Aktif Card -->
    <div class="col-md-3 mb-4">
        <a href="/admin/konsultasi" class="text-decoration-none">
            <div class="card stat-card h-100 position-relative overflow-hidden">
                <div class="card-body text-center">
                    <i class="fas fa-comments icon-background"></i>
                    <h5 class="card-title">Konsultasi Aktif</h5>
                    <p class="card-text display-6"><?= $total_konsultasi ?></p>
                    <small class="text-dark"><?= $total_konsultasi > 0 ? rand(1,$total_konsultasi).' belum dibalas' : 'Tidak ada konsultasi' ?></small>
                </div>
            </div>
        </a>
    </div>
    
    <!-- Total Pengguna Card -->
    <div class="col-md-3 mb-4">
        <a href="/admin/akun" class="text-decoration-none">
            <div class="card stat-card h-100 position-relative overflow-hidden">
                <div class="card-body text-center">
                    <i class="fas fa-users icon-background"></i>
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text display-6"><?= $total_user ?></p>
                    <small class="text-dark"><?= $total_user > 0 ? '+'.rand(1,3).' baru bulan ini' : 'Belum ada pengguna' ?></small>
                </div>
            </div>
        </a>
    </div>

    <!-- Pesanan Card -->
    <div class="col-md-3 mb-4">
        <a href="/admin/pesanan" class="text-decoration-none">
            <div class="card stat-card h-100 position-relative overflow-hidden">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart icon-background"></i>
                    <h5 class="card-title">Pesanan</h5>
                    <p class="card-text display-6"><?= $total_pesanan_hari_ini ?? 0 ?></p>
                </div>
            </div>
        </a>
    </div>
</div>

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
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .card-body {
        position: relative;
        z-index: 1;
    }
    
    /* Style baru untuk notifikasi */
    .notification-item {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: transform 0.2s;
        display: flex;
        align-items: flex-start;
        border-left: 4px solid transparent;
    }
    
    .notification-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .notification-item.unread {
        border-left-color: #3498db;
        background-color: #f8f9fa;
    }
    
    .notification-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .notification-icon.order {
        background-color: #e3f2fd;
        color: #1976d2;
    }
    
    .notification-icon.consult {
        background-color: #e8f5e9;
        color: #388e3c;
    }
    
    .notification-icon.stock {
        background-color: #fff3e0;
        color: #ffa000;
    }
    
    .notification-content {
        flex-grow: 1;
    }
    
    .notification-time {
        font-size: 12px;
        color: #95a5a6;
        margin-bottom: 5px;
    }
    
    .notification-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
    }
    
    .notification-desc {
        font-size: 14px;
        color: #7f8c8d;
    }
    
    .notification-badge {
        background-color: #e74c3c;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        margin-left: 10px;
    }
    
    .notification-header {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eaeaea;
    }
</style>




    

<script>
    // Script untuk chart (menggunakan Chart.js)
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Aktivitas',
                    data: [12, 19, 8, 15, 14, 17, 10],
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    borderColor: 'rgba(52, 152, 219, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
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
    
    

<script>
    // Fungsi untuk menandai notifikasi sebagai telah dibaca
    document.querySelectorAll('.notification-item').forEach(item => {
        item.addEventListener('click', function(e) {
            // Mencegah navigasi jika mengklik bagian tertentu
            if (!e.target.closest('a')) {
                this.classList.remove('unread');
                const badge = this.querySelector('.notification-badge');
                if (badge) {
                    badge.remove();
                }
                
                // Di sini Anda bisa menambahkan AJAX untuk update status di database
                // fetch('/admin/notifikasi/mark-as-read', { method: 'POST' });
                
                // Update counter notifikasi
                const notificationCount = document.querySelector('.card-header .badge');
                if (notificationCount) {
                    const currentCount = parseInt(notificationCount.textContent);
                    if (currentCount > 1) {
                        notificationCount.textContent = currentCount - 1;
                    } else {
                        notificationCount.remove();
                    }
                }
            }
        });
    });
</script>

<?= $this->endSection() ?>