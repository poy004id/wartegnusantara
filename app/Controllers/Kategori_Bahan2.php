<?php namespace App\Controllers;

use App\Models\Kategori_Bahan_model;
use App\Models\Auth_model;

class Kategori_Bahan extends BaseController
{
	public function __construct()
    {
		$this->cek_login();
		$session = \Config\Services::session();

		if($this->cek_login() == FALSE){
			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
			return redirect()->to('/auth/login');
			}
		}

	public function index()
	{



		 $data['userdata'] = session('username');
		 $model= new Kategori_Bahan_model();
		 $data['kategori'] = $model->findAll();

		 // echo "<pre>";
		 // foreach ($data['kategori'] as $key => $row) {
			//  print_r($row);
     //   echo "<br/>";
		 // }
		 //
     // exit;


		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    echo view('kategori_bahan/index',$data);
		echo view('_partials/footer');
    }

}
