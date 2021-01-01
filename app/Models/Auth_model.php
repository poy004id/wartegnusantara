<?php namespace App\Models;
use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = "user";

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
        // echo "<pre>";
        // print_r($username);
        // foreach ($hasil as $key => $value) {
        //   print_r($value );
        //   print_r("<br/>");
        // }
        //
        //
        // exit;

        } else {
            $hasil = array();
        }
        return $hasil;
    }

    // public function register($data)
    // {
    //     return $this->db->table($this->table)->insert($data);
    // }
}
?>
