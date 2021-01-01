<?php namespace App\Models;
use CodeIgniter\Model;

class Menu_model extends Model
{

    protected $table = 'menu';
    protected $allowedFields = ['id', 'nama_menu', 'harga','id_kategori_menu','keterangan','jumlah'];

}
