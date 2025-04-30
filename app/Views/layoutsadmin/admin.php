<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? 'Admin Panel' ?></title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Custom sidebar styles */
    #sidebarMenu {
      min-height: 100vh;
      border-right: 1px solid #dee2e6;
    }
    #sidebarMenu .nav-link {
      color: #495057;
      font-weight: 500;
      padding: 12px 20px;
      border-radius: 6px;
      transition: background-color 0.2s, color 0.2s;
    }
    #sidebarMenu .nav-link:hover {
      background-color: #0d6efd;
      color: white;
      text-decoration: none;
    }
    #sidebarMenu .nav-link.active {
      background-color: #0d6efd;
      color: white;
      font-weight: 700;
    }
    #sidebarMenu .nav-link.text-danger:hover {
      background-color: #dc3545;
      color: white !important;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/admin/dashboard') ?>">Petshop Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Sidebar + Content -->
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>" href="<?= base_url('/admin/dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/produk' ? 'active' : '' ?>" href="<?= base_url('/admin/produk') ?>">Kelola Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/layanan' ? 'active' : '' ?>" href="<?= base_url('/admin/layanan') ?>">Kelola Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/konsultasi' ? 'active' : '' ?>" href="<?= base_url('/admin/konsultasi') ?>">Konsultasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= uri_string() == 'admin/akun' ? 'active' : '' ?>" href="<?= base_url('/admin/akun') ?>">Pengaturan Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="/admin/logout" onclick="return confirm('Yakin ingin logout?')">Logout</a>
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
