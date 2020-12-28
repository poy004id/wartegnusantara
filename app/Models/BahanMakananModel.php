<?php namespace App\Models;
use CodeIgniter\Model;

class BahanMakananModel extends Model
{
    protected $table = 'bahanmakanan';

    // public function getData($id = false)
    // {
    //     if($id === false){
    //         return $this->findAll();
    //     } else {
    //         return $this->getWhere(['ID' => $id]);
    //     }
    // }

    public function getData($id = false)
    {
        if($id === false){
            return $this->table('bahanmakanan')
                        ->join('kategoribahanmakanan', 'kategoribahanmakanan.ID = bahanmakanan.kategoribahanmakananID')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('bahanmakanan')
                        ->join('kategoribahanmakanan', 'kategoribahanmakanan.ID = bahanmakanan.kategoribahanmakananID')
                        ->where('kategoribahanmakananID', $id)
                        ->get()
                        ->getRowArray();
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
