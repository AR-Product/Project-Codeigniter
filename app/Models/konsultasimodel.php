<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'nama_pasien', 'subjek', 'keluhan', 'status', 'tanggal'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getKonsultasiWithUser()
    {
        return $this->select('konsultasi.*, users.username as nama_pasien')
                   ->join('users', 'users.id = konsultasi.user_id')
                   ->findAll();
    }
}