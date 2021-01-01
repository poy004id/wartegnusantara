<?php namespace App\Models;
use CodeIgniter\Model;

class Kategori_Bahan_model extends Model
{

    protected $table = 'kategori_bahan';
    protected $allowedFields = ['id_kategori_bahan', 'nama_kategori', 'status'];

}
