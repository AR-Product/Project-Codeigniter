<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal'; // Name of the schedule table
    protected $primaryKey = 'id'; // Primary key column

    protected $allowedFields = ['dokter_id', 'tanggal', 'jam', 'status']; // Adjust based on your database
}
