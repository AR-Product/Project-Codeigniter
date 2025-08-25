<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth Routes (Login, Register, Logout)
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

// Pelanggan Routes

$routes->group('pelanggan', function($routes) {
    $routes->get('/', 'Pelanggan::index');
    $routes->get('produk', 'Pelanggan::produk');
    $routes->get('layanan', 'Pelanggan::layanan');
    $routes->get('layanan/(:num)', 'Pelanggan::detailLayanan/$1');

    $routes->get('konsultasi', 'Pelanggan::konsultasi');
    $routes->post('konsultasi/kirim', 'Pelanggan::kirimKonsultasi');

    // Checkout and Keranjang
    $routes->get('checkout', 'Pelanggan::checkout');

    // Route proses form checkout (POST)
    $routes->post('checkout/proses', 'Pelanggan::prosesCheckout');

    // Route halaman sukses checkout
    $routes->get('checkout/sukses', 'Pelanggan::checkoutSukses');

    $routes->get('pesanan', 'Pelanggan::pesanan'); // Added for customer order history
    $routes->get('pesanan/detail/(:num)', 'Pelanggan::detailPesanan/$1'); // Added for order details

    $routes->get('keranjang', 'Pelanggan\Keranjang::index');
    $routes->post('keranjang/tambah', 'Pelanggan\Keranjang::tambah');
    $routes->get('keranjang/hapus/(:segment)', 'Pelanggan\Keranjang::hapus/$1');
    $routes->get('keranjang/kosongkan', 'Pelanggan\Keranjang::kosongkan');

    // Akun Pelanggan
    $routes->get('akun', 'Pelanggan::akun');
    $routes->post('akun/update', 'Pelanggan::updateProfil');
    $routes->post('akun/ubahpassword', 'Pelanggan::ubahPassword');
});

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('dashboard/orders-by-date', 'Admin::getOrdersByDate');

    // Produk Management
    $routes->get('produk', 'Admin::produk');
    $routes->post('produk/tambah', 'Admin::tambahProduk');
    $routes->get('produk/edit/(:num)', 'Admin::editProduk/$1');
    $routes->post('produk/update/(:num)', 'Admin::updateProduk/$1');
    $routes->get('produk/delete/(:num)', 'Admin::delete/$1');

    // Layanan Management
    $routes->get('layanan', 'Admin::layanan');
    $routes->post('layanan/tambah', 'Admin::tambahLayanan');
    $routes->get('layanan/edit/(:num)', 'Admin::editLayanan/$1');
    $routes->post('layanan/update/(:num)', 'Admin::updateLayanan/$1');
    $routes->get('layanan/delete/(:num)', 'Admin::deleteLayanan/$1');

    // Pesanan Management (NEW)
    $routes->get('pesanan', 'Admin\Pesanan::index', ['as' => 'admin.pesanan']);
    $routes->get('/admin/pesanan/detail/(:num)', 'Admin\Pesanan::detail/$1');
    $routes->post('pesanan/update-status/(:num)', 'Admin\Pesanan::updateStatus/$1', ['as' => 'admin.pesanan.update-status']);
    $routes->get('pesanan/cetak/(:num)', 'Admin\Pesanan::cetak/$1', ['as' => 'admin.pesanan.cetak']);
    $routes->get('pesanan/export', 'Admin\Pesanan::export', ['as' => 'admin.pesanan.export']);

    // Akun Management  
    $routes->get('akun', 'Admin::akun');
    $routes->post('akun/tambah', 'Admin::tambahAkun');
    $routes->get('akun/edit/(:num)', 'Admin::editAkun/$1');
    $routes->post('akun/update/(:num)', 'Admin::updateAkun/$1');
    $routes->get('akun/delete/(:num)', 'Admin::deleteAkun/$1');

    // Konsultasi Management

    // Konsultasi Routes
    $routes->get('konsultasi', 'Admin\Konsultasi::index');
    $routes->post('konsultasi/simpan', 'Admin\Konsultasi::simpan');
    $routes->get('konsultasi/detail/(:num)', 'Admin\Konsultasi::detail/$1');
    $routes->get('konsultasi/edit/(:num)', 'Admin\Konsultasi::edit/$1');
    $routes->post('konsultasi/update/(:num)', 'Admin\Konsultasi::update/$1');
    $routes->get('konsultasi/hapus/(:num)', 'Konsultasi::hapus/$1');


});
    // Admin Logout
    $routes->get('logout', 'Admin::logout');


// Dokter Routes
$routes->group('dokter', function($routes) {
    $routes->get('/', 'Dokter::index');
    $routes->get('konsultasi', 'Dokter::konsultasi');
    $routes->get('konsultasi-masuk', 'Dokter::konsultasiMasuk');
    $routes->post('konsultasi/(:num)/balas', 'Dokter::balasKonsultasi/$1');
    $routes->get('tanggapi_konsultasi/(:num)', 'Dokter::tanggapiKonsultasi/$1');
    $routes->post('tanggapi_konsultasi/(:num)', 'Dokter::simpanTanggapan/$1');
    $routes->get('profil', 'Dokter::profil');
    $routes->get('riwayat_konsultasi', 'Dokter::riwayat_konsultasi');
    $routes->get('tambah_konsultasi', 'Dokter::tambah');
    $routes->post('simpan', 'Dokter::simpan');
});

// General Consultation
$routes->get('/konsultasi', 'Konsultasi::index');