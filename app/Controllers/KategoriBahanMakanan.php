<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models\UserModel;



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
    echo view('_partials/header', ['userData' => $this->session->userData]);
    echo view('_partials/sidebar');
		echo view('kategoribahanmakanan/index');
    echo view('_partials/footer');
	}
}
