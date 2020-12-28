<?php namespace App\Models;
use CodeIgniter\Model;

class KategoriBahanMakananModel extends Model
{
    protected $table = 'kategoribahanmakanan';

    public function getCategory($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['ID' => $id]);
        }
    }

    public function insertCategory($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ID' => $id]);
    }

      public function del($data, $id)
    {
         return $this->db->table($this->table)->update($data,['ID' => $id]);
    }
}
