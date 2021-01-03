<?php namespace App\Models;
use CodeIgniter\Model;

class Transaksi_model extends Model
{

    protected $table = 'transaksi';
    protected $allowedFields = ['id', 'nama_menu', 'harga','id_kategori_menu','keterangan','jumlah'];

    function get_nofak(){
    	$db      = \Config\Database::connect();
		$q = $db->query("SELECT MAX(RIGHT(id,4)) AS kd_max FROM transaksi WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        // $query = $q->getRow();
        if(isset($q)>0){
            foreach($q->getResult() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "01";
        }
        return date('dmy').$kd;
	}
    function simpan_penjualan($nofak,$total,$tanggal, $kasir){
    	$cart = \Config\Services::cart();
    	$db      = \Config\Database::connect();
		$builder = $db->table('transaksi');
		$data = [
			'id' => $nofak,
        'tanggal'  => $tanggal,
        'total_harga'  => $total,
        'id_user' => $kasir,
		];

		$builder->insert($data);
		foreach ($cart->contents() as $item) {
			$detail = $db->table('detail_transaksi');
			$data=array(
				'id_transaksi' 			=>	$nofak,
				'id_menu'			=>	$item['id'],
				'harga'				=>	$item['price'],
				'jumlah'			=>	$item['qty'],
			);
			$detail->insert($data);
			$db->query("update menu set jumlah=jumlah-'$item[qty]' where id='$item[id]'");
		}
		return true;
	}
    

}
