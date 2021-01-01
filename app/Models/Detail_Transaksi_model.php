<?php namespace App\Models;
use CodeIgniter\Model;

class Detail_Transaksi_model extends Model
{

    protected $table = 'detail_transaksi';
    protected $allowedFields = ['id', 'nama_menu', 'harga','id_kategori_menu','keterangan','jumlah'];

}
