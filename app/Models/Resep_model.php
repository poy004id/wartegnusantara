<?php namespace App\Models;
use CodeIgniter\Model;

class Resep_model extends Model
{

    protected $table = 'resep';
    protected $allowedFields = ['id', 'id_menu', 'jumlah','id_bahan'];

}
