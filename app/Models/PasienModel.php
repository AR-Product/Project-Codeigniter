<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'pasien'; // Name of the patients table
    protected $primaryKey = 'id'; // Primary key column

    protected $allowedFields = ['nama', 'alamat', 'telepon']; // Adjust according to your table
}