<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_pasien',
        'tanggal',
        'keluhan',
        'diagnosa',
        'resep',
        'created_at',
        'updated_at'
    ];

    // Jika kamu ingin otomatis mengisi created_at dan updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
