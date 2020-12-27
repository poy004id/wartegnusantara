<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models\UserModel;
use App\Models\KategoriBahanMakananModel;



class KategoriBahanMakanan extends BaseController
{
  protected $session;
	protected $config;

  public function __construct()
	{
		$this->session = Services::session();
  }

	public function index()
	{
    // 	$session->userData;
		// // $userdata = ['name' => 'Warteg Nusantara'];
    // echo view('_partials/header',$userData);
    $model = new KategoriBahanMakananModel();
    $data['categories'] = $model->getCategory();

    echo view('_partials/header', ['userData' => $this->session->userData]);
    echo view('_partials/sidebar');
		echo view('kategoribahanmakanan/index',$data);
    echo view('_partials/footer');
	}

  public function create()
      {
        // echo view('_partials/header', ['userData' => $this->session->userData]);
        // echo view('_partials/sidebar');
        echo view('KategoriBahanMakanan/create');
        echo view('_partials/footer');
      }

      public function store()
    {

      echo "123";
    //     $validation =  \Config\Services::validation();
    //
    //     $data = array(
    //         'NamaKategori'     => $this->request->getPost('NamaKategori'),
    //         'isActive'   => $this->request->getPost('isActive'),
    //     );
    //
    //     if($validation->run($data, 'KategoriBahanMakanan') == FALSE){
    //         session()->setFlashdata('inputs', $this->request->getPost());
    //         session()->setFlashdata('errors', $validation->getErrors());
    //         //return redirect()->to(base_url('KategoriBahanMakanan/create'));
    //         echo "validasi gagal";
    //     } else {
    //       echo "validasi hore";
    //         // $model = new Category_model();
    //         // $simpan = $model->insertCategory($data);
    //         // if($simpan)
    //         // {
    //         //     session()->setFlashdata('success', 'Created Category successfully');
    //         //     return redirect()->to(base_url('category'));
    //         // }
    //     }
    }

}
