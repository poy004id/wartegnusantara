<?php namespace App\Models;
use CodeIgniter\Model;

class Kategori_Menu_model extends Model
{

    protected $table = 'kategori_menu';
    protected $allowedFields = ['id_kategori_bahan', 'nama_kategori', 'status'];

}
