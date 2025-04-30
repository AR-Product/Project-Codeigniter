<?php
namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'role', 'password'];

}
