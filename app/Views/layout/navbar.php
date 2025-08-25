<!-- Navbar ala Groowy Clinic -->
<nav class="navbar navbar-expand-lg" style="background-color: #ffb700;">
  <div class="container">
    <!-- Logo kiri -->
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url('pelanggan'); ?>">
      
      <span >🐾Groowy Klinik</span>
    </a>

    <!-- Toggle tombol hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu kanan -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('pelanggan'); ?>">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('pelanggan/produk'); ?>">Produk</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('pelanggan/layanan'); ?>">Layanan</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('pelanggan/konsultasi'); ?>">Konsultasi</a></li>

        <li class="nav-item">
          <a class="nav-link text-white position-relative" href="<?= base_url('pelanggan/keranjang'); ?>">
            Keranjang
            <?php $cart = session()->get('cart') ?? []; ?>
            <?php if(count($cart) > 0): ?>
              <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">
                <?= count($cart) ?>
              </span>
            <?php endif; ?>
          </a>
        </li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('/logout'); ?>">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
