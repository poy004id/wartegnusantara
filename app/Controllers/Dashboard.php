<?php namespace App\Controllers;

use App\Models\Dashboard_model;
use App\Models\Auth_model;
use App\Models\Detail_Transaksi_model;



class Dashboard extends BaseController
{
	public function __construct()
    {
		//$this->cek_login();
		$this->dashboard_model = new Dashboard_model();
		$session = \Config\Services::session();
		}

	public function index()
	{

		 $data['userdata'] = session('username');
		 // $model= new Resep_model();
		 $detail_transaksi_model= new Detail_Transaksi_model();
    // modul belum di buat, rap maklum ini juga hasil copy punya orang trus diseusuaikan dengan kebutuhan. tp aku buat dari awal
		// $data['total_transaction']	= $this->dashboard_model->getCountTrx();
		// $data['total_product']		= $this->dashboard_model->getCountProduct();
		// $data['total_category']		= $this->dashboard_model->getCountCategory();
		// $data['total_user']			= $this->dashboard_model->getCountUser();
		$data['menu_fav']	 = $detail_transaksi_model->select('detail_transaksi.id as id,id_menu, nama_menu, menu.harga as harga, sum(detail_transaksi.jumlah) as total_penjualan')
															->join('menu', 'detail_transaksi.id_menu=menu.id')
			 												->groupBy('id_menu')
															->orderBy('total_penjualan','desc')
															->limit(5)
															->find();

					
	    //
		// $chart['grafik']			= $this->dashboard_model->getGrafik();

		// echo view('dashboard', $data);
		// echo view('_partials/footer', $chart);
		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    echo view('dashboard');
		echo view('_partials/footer');
    }

}
