<?php namespace App\Models;
use CodeIgniter\Model;

class Bahan_model extends Model
{

    protected $table = 'bahan';
    protected $allowedFields = ['id', 'nama_bahan', 'jumlah','id_kategori_bahan','satuan'];

}
