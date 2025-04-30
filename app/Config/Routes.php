<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/pelanggan', 'Pelanggan::index');

$routes->get('/dokter', 'Dokter::index');


// Tambahan khusus halaman pelanggan (yang kamu minta)
$routes->get('/pelanggan/produk', 'Pelanggan::produk');
$routes->get('/pelanggan/layanan', 'Pelanggan::layanan');
$routes->get('/pelanggan/konsultasi', 'Pelanggan::konsultasi');

// Tambahan untuk Setting Akun pelanggan
$routes->get('/pelanggan/akun', 'Pelanggan::akun');
$routes->post('/pelanggan/akun/update', 'Pelanggan::updateProfil');
$routes->post('/pelanggan/akun/ubahpassword', 'Pelanggan::ubahPassword');
$routes->post('/pelanggan/updateProfil', 'Pelanggan::updateProfil');
$routes->post('/pelanggan/ubahPassword', 'Pelanggan::ubahPassword');

// Admin
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/produk', 'Admin::produk');
$routes->post('/admin/produk/tambah', 'Admin::tambahProduk');
$routes->get('/admin/produk/edit/(:num)', 'Admin::editProduk/$1');
$routes->post('/admin/produk/update/(:num)', 'Admin::updateProduk/$1');
$routes->post('/admin/layanan/tambah', 'Admin::tambahLayanan');
$routes->get('/admin/produk/delete/(:num)', 'Admin::delete/$1');

$routes->get('/admin/layanan/edit/(:num)', 'Admin::editLayanan/$1');
$routes->post('/admin/layanan/update/(:num)', 'Admin::updateLayanan/$1');
$routes->get('/admin/layanan/delete/(:num)', 'Admin::deleteLayanan/$1');

$routes->get('/admin/akun/edit/(:num)', 'Admin::editAkun/$1');
$routes->post('/admin/akun/update/(:num)', 'Admin::updateAkun/$1');
$routes->get('/admin/akun/delete/(:num)', 'Admin::deleteAkun/$1');
$routes->get('/admin/akun', 'Admin::akun');
$routes->post('/admin/akun/tambah', 'Admin::tambahAkun');



$routes->get('/admin/layanan', 'Admin::layanan');
$routes->get('/admin/konsultasi', 'Admin::konsultasi');

$routes->get('/admin/logout', 'Admin::logout');


$routes->get('/dokter', 'Dokter::index');
$routes->get('/dokter/konsultasi', 'Dokter::konsultasi'); // Halaman konsultasi dokter
$routes->get('/dokter/profil', 'Dokter::profil'); // Halaman profil dokter
$routes->get('logout', 'Auth::logout'); // Halaman logout (opsional tergantung strukturmu)
$routes->get('dokter/riwayat_konsultasi', 'Dokter::riwayat_konsultasi');
$routes->get('/dokter/konsultasi', 'Dokter::konsultasiMasuk');

$routes->get('/konsultasi', 'Konsultasi::index');          // Menampilkan daftar konsultasi (Riwayat Konsultasi)
$routes->get('/dokter/tambah_konsultasi', 'Dokter::tambah');      // Menampilkan form tambah konsultasi
$routes->post('/dokter/simpan', 'Dokter::simpan');               // Proses simpan data konsultasi
$routes->get('/dokter/riwayat_konsultasi', 'Dokter::riwayat_konsultasi'); // Menampilkan riwayat konsultasi

 // misal untuk menampilkan riwayat
