<?php

// app/Models/PesananModel.php
namespace App\Models;
use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table         = 'pesanan';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'user_id',           // FK ke tabel users
        'tanggal_pesanan',
        'total_harga',
        'status_pesanan',    // kolom di DB-mu
        'metode_pembayaran',
        'metode_pengiriman'
    ];
    protected $useTimestamps = true;   // created_at & updated_at otomatis
}
