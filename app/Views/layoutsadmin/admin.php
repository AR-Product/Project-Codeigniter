<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? 'Admin Panel' ?></title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #FFC107;
      --primary-dark: #FFA000;
      --secondary-color: #FFEB3B;
      --light-color: #FFFFFF;
      --dark-color: #212529;
      --gray-light: #F5F5F5;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--gray-light);
    }
    
    /* Navbar styles */
    .navbar {
      background-color: var(--primary-color);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
      font-weight: 700;
      letter-spacing: 0.5px;
      color: var(--dark-color);
    }
    
    .navbar-dark .navbar-toggler {
      color: var(--dark-color);
      border-color: rgba(0, 0, 0, 0.1);
    }
    
    /* Sidebar styles */
    #sidebarMenu {
      min-height: 100vh;
      background-color: var(--light-color);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s;
    }
    
    #sidebarMenu .nav-link {
      color: var(--dark-color);
      font-weight: 500;
      padding: 12px 20px;
      margin: 4px 10px;
      border-radius: 8px;
      transition: all 0.3s;
    }
    
    #sidebarMenu .nav-link:hover {
      background-color: var(--primary-color);
      color: var(--dark-color);
      transform: translateX(5px);
    }
    
    #sidebarMenu .nav-link.active {
      background-color: var(--primary-color);
      color: var(--dark-color);
      font-weight: 600;
    }
    
    #sidebarMenu .nav-link i {
      margin-right: 10px;
      width: 20px;
      text-align: center;
      color: var(--dark-color);
    }
    
    /* Main content area */
    main {
      background-color: var(--light-color);
      min-height: calc(100vh - 56px);
    }
    
    /* Card styles */
    .stat-card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s, box-shadow 0.3s;
      overflow: hidden;
      background-color: var(--primary-color);
      color: var(--dark-color);
    }
    
    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .stat-card .card-body {
      position: relative;
      z-index: 1;
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: -50px;
      right: -50px;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
    }
    
    .stat-card .card-title {
      font-size: 1rem;
      font-weight: 500;
      color: var(--dark-color);
      margin-bottom: 10px;
    }
    
    .stat-card .card-text {
      font-size: 1.75rem;
      font-weight: 600;     
      color: var(--dark-color);
    }
    
    .stat-card i {
      font-size: 2.5rem;
      opacity: 0.3;
      position: absolute;
      right: 20px;
      top: 20px;
      color: var(--dark-color);
    }
    
    /* Page header */
    .page-header {
      border-bottom: none;
      margin-bottom: 2rem;
    }
    
    .page-header h1 {
      font-weight: 600;
      color: var(--dark-color);
      position: relative;
      padding-bottom: 10px;
    }
    
    .page-header h1::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 50px;
      height: 3px;
      background: var(--primary-dark);
      border-radius: 3px;
    }
    
    /* Custom button */
    .btn-outline-yellow {
      color: var(--dark-color);
      border-color: var(--primary-dark);
    }
    
    .btn-outline-yellow:hover {
      background-color: var(--primary-dark);
      color: var(--dark-color);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/admin/dashboard') ?>">
      <i class="fas fa-paw me-2"></i>Pathboard Admin
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-user-circle me-1"></i> Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= base_url('/admin/akun') ?>"><i class="fas fa-user-cog me-2"></i>Pengaturan Akun</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="/admin/logout" onclick="return confirm('Yakin ingin logout?')"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar + Content -->
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>" href="<?= base_url('/admin/dashboard') ?>">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/produk' ? 'active' : '' ?>" href="<?= base_url('/admin/produk') ?>">
              <i class="fas fa-box-open"></i> Kelola Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/layanan' ? 'active' : '' ?>" href="<?= base_url('/admin/layanan') ?>">
              <i class="fas fa-concierge-bell"></i> Kelola Layanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/konsultasi' ? 'active' : '' ?>" href="<?= base_url('/admin/konsultasi') ?>">
              <i class="fas fa-comments"></i> Konsultasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/pesanan' ? 'active' : '' ?>" href="<?= base_url('/admin/pesanan') ?>">
              <i class="fas fa-comments"></i> Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/akun' ? 'active' : '' ?>" href="<?= base_url('/admin/akun') ?>">
              <i class="fas fa-users-cog"></i> Pengguna
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
      <?= $this->renderSection('content') ?>
    </main>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>