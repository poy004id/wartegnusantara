<?php namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = "user";
      protected $allowedFields = ['id', 'nama', 'username','no_hp','password', 'status','level'];

    public function cek_login($username)
    {
        $query = $this->table('user')
                ->where('username', $username)
                ->countAll();

        if($query >  0){
            $hasil = $this->table('user')
                    ->where('username', $username)
                    ->limit(1)
                    ->get()
                    ->getRowArray();
        } else {
            $hasil = array();
        }
        return $hasil;
    }

}
?>
