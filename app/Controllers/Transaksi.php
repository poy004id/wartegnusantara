<?php namespace App\Controllers;

use App\Models\Transaksi_model;
use App\Models\Detail_Transaksi_model;
use App\Models\User_model;
use App\Models\Menu_model;


class Transaksi extends BaseController
{
	protected $db, $builder;
	public function __construct()
    {
		$session = \Config\Services::session();
		helper('form');
		$this->db 	 = \Config\Database::connect();
		$this->builder = $this->db->table('transaksi');
	}

	public function index(){
		$data['userdata'] = session('userdata');
		$this->builder->select('transaksi.id as transaksi_id, tanggal,total_harga, id_user');
		$query=$this->builder->get();
		$data['item'] = $query->getResult();
		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    	echo view('transaksi/index',$data);
		echo view('_partials/footer');
    }

	public function create()
	{
		$transaksidetailmodel= new Detail_Transaksi_model();
		$transaksimodel= new Transaksi_model();
  		$menumodel= new Menu_model();
		$data['userdata'] = session('userdata');
		$data['cart'] = \Config\Services::cart();
		$data['menu'] = $menumodel->findAll();
		$data['transaksi'] = $transaksidetailmodel->findAll();
		$data['id']=$transaksimodel->get_nofak();

  	echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
		echo view('transaksi/create',$data);
		echo view('_partials/footer');

	}
	public function cek(){
		$cart = \Config\Services::cart();
		$response = $cart->contents();
		$data = json_encode($response);
		echo'<pre>';
		print_r($data);
		echo'<pre>';
	}
	public function add_cart(){
		$menumodel= new Menu_model();
		$cart = \Config\Services::cart();
		$id = $this->request->getPost('id_menu');
		$produk=$menumodel->find($id);
		$data = array(
               'id'       => $produk['id'],
               'name'     => $produk['nama_menu'],
               'price'    => $produk['harga'],
               'qty'      => $this->request->getPost('jumlah'),
            );
		$cart->insert($data);
		return redirect()->to('create');
	}
	public function remove($rowid){
		$cart = \Config\Services::cart();
    	$cart->remove($rowid);
    	return redirect()->to(base_url('transaksi/create'));
  	}
  	public function simpan(){
  		$cart = \Config\Services::cart();
  		$transaksimodel= new Transaksi_model();
  		$tanggal= date('Y-m-d H:i:s');
  		$kasir= $this->request->getPost('kasir');
  		$total= $this->request->getPost('total');
  		$nofak= $this->request->getPost('nofak');
		// $jml_uang=str_replace(",", "", $this->request->getPost('jml_uang'));
		// $kembalian=$jml_uang-$total;


		$order_proses=$transaksimodel->simpan_penjualan($nofak,$total,$tanggal, $kasir);
		$cart->destroy();

		return redirect()->to(base_url('transaksi'));

  	}
  	public function detail($transaksi_id){
  		$data['userdata'] = session('userdata');
		$this->builder->select('transaksi.id as transaksi_id, tanggal, transaksi.id_user as kasir, total_harga, id_menu, nama_menu, detail_transaksi.harga as price, detail_transaksi.jumlah as qty');
		$this->builder->join('detail_transaksi','detail_transaksi.id_transaksi=transaksi.id');
		$this->builder->join('menu','menu.id=detail_transaksi.id_menu');
		$this->builder->where('transaksi.id',$transaksi_id);
		$query=$this->builder->get();
		$data['item'] = $query->getResult();
		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    	echo view('transaksi/detail',$data);
		echo view('_partials/footer');
  	}

}
