<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'users'; // or whatever your customers table is
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'telepon', 'alamat', 'role'];
    
    public function getPelanggan()
    {
        return $this->where('role', 'pelanggan')->findAll();
    }
}