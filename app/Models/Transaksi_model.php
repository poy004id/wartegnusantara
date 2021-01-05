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
    public function view_by_date($tgl){
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->where('DATE(tanggal)',$tgl);
        $query = $builder->get();
        return $query->getResultArray();
      }
        
      public function view_by_month($bulan, $tahun){
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->where('MONTH(tanggal)',$bulan);
        $builder->where('YEAR(tanggal)',$tahun);
        $query = $builder->get();
        return $query->getResultArray();
      }
        
      public function view_by_year($tahun){
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        $builder->where('YEAR(tanggal)',$tahun);
        $query = $builder->get();
        return $query->getResultArray();
      }
   
      public function option_tahun(){
        $this->builder->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
         // select ke tabel transaksi
        $this->builder->orderBy('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->builder->groupBy('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        
        $this->builder->get(); // Ambil data pada tabel transaksi sesuai kondisi diatas
        }
}
