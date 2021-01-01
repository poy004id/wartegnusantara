<?php namespace App\Models;
use CodeIgniter\Model;

class Transaksi_model extends Model
{

    protected $table = 'transaksi';
    protected $allowedFields = ['id', 'nama_menu', 'harga','id_kategori_menu','keterangan','jumlah'];

}
