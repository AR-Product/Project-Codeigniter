<!-- layout/navbar_dokter.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --primary-color: #FFC107; /* Warna kuning sama seperti admin */
      --primary-dark: #FFA000;
      --light-color: #FFFFFF;
      --dark-color: #212529;
    }
    
    .navbar-dokter {
      background-color: var(--primary-color);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.5rem 1rem;
    }
    
    .navbar-brand-dokter {
      font-weight: 700;
      letter-spacing: 0.5px;
      color: var(--dark-color);
      font-size: 1.25rem;
    }
    
    .navbar-dokter .nav-link {
      color: var(--dark-color);
      font-weight: 500;
      padding: 0.5rem 1rem;
    }
    
    .navbar-dokter .nav-link.active {
      font-weight: 600;
      background-color: rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    
    .navbar-dokter .dropdown-menu {
      border-radius: 8px;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dokter">
  <div class="container-fluid">
    <a class="navbar-brand navbar-brand-dokter" href="<?= base_url('/dokter/dashboard') ?>">
      <i class="fas fa-user-md me-2"></i>Pathop Dokter
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDokter">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDokter">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('/dokter/dashboard') ?>">
            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/dokter/logout" onclick="return confirm('Yakin ingin logout?')">
            <i class="fas fa-sign-out-alt me-1"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>