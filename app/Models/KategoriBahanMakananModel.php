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
            return $this->getWhere(['category_id' => $id]);
        }
    }

    public function insertCategory($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['category_id' => $id]);
    }

    public function deleteCategory($id)
    {
        return $this->db->table($this->table)->delete(['category_id' => $id]);
    }
}
