<?php
namespace App\Models;
use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table = 'pesanan_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesanan_id', 'produk_id', 'qty', 'harga_satuan', 'subtotal'];
    public $timestamps = false;
}
