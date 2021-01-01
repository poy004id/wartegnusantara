<?php namespace App\Controllers;

use App\Models\Dashboard_model;
use App\Models\Auth_model;



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
    // echo "<pre>";
    // print_r($pass);
    // echo "<br/>";
    // print_r $cek_login();
    // exit;
// 		if($this->cek_login() == FALSE){
// 			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');

// 			return redirect()->to('/auth/login');
// 		}
		 $data['userdata'] = session('username');

    // modul belum di buat, rap maklum ini juga hasil copy punya orang trus diseusuaikan dengan kebutuhan. tp aku buat dari awal
		// $data['total_transaction']	= $this->dashboard_model->getCountTrx();
		// $data['total_product']		= $this->dashboard_model->getCountProduct();
		// $data['total_category']		= $this->dashboard_model->getCountCategory();
		// $data['total_user']			= $this->dashboard_model->getCountUser();
		// $data['latest_trx']			= $this->dashboard_model->getLatestTrx();
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
