<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('pelanggan'); ?>">Petshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan'); ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/produk'); ?>">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/layanan'); ?>">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('pelanggan/konsultasi'); ?>">Konsultasi</a></li>
        <li class="nav-item">
    <a class="nav-link" href="<?= base_url('pelanggan/akun') ?>">Akun</a>
</li>

        <li class="nav-item"><a class="nav-link" href="<?= base_url('/logout'); ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
