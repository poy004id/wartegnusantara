<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models\UserModel;
use App\Models\BahanMakananModel;



class BahanMakanan extends BaseController
{
  protected $session;
	protected $config;

  public function __construct()
	{
		$this->session = Services::session();
  }

	public function index()
	{

    $model = new BahanMakananModel();
    $data['BahanMakanan'] = $model->getData();
    echo view('_partials/header', ['userData' => $this->session->userData]);
    echo view('_partials/sidebar');
		echo view('bahanmakanan/index',$data);
    echo view('_partials/footer');
	}

  public function create()
      {
        echo view('_partials/header', ['userData' => $this->session->userData]);
        echo view('_partials/sidebar');
        echo view('BahanMakanan/create');
       echo view('_partials/footer');
      }

      public function store()
      {

        $validation =  \Config\Services::validation();

        $data = array(
            'NamaKategori'=> $this->request->getVar('NamaKategori'),
            'isActive'   => $this->request->getVar('isActive'),
        );
        echo $data['NamaKategori'];
        if($validation->run($data, 'KategoriBahanMakanan') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('KategoriBahanMakanan/create'));

          }
        else {
            $model = new KategoriBahanMakananModel();
            $simpan = $model->insertCategory($data);
            if($simpan)
              {
                  session()->setFlashdata('success', 'Created Category successfully');
                  return redirect()->to(base_url('KategoriBahanMakanan'));
              }
        }
      }

      public function delete($id)
      {
      $data = array('isActive'=> 0);
      $model = new KategoriBahanMakananModel();
      $hapus = $model->del($data,$id);
      if($hapus)
      {
          session()->setFlashdata('warning', 'Deleted Category successfully');
           return redirect()->to(base_url('KategoriBahanMakanan'));
      }
      }

      public function edit($id)
          {
              $model = new BahanMakananModel();
              $data = array(
                  'bahanmakanan'     => $model->getData($id),
                  'getAll'           => $model->getData(),
              );
              echo view('BahanMakanan/edit', $data, );
          }

      public function update()
          {
              $id = $this->request->getVar('ID');

              $validation =  \Config\Services::validation();

              $data = array(
                  'NamaKategori'     => $this->request->getVar('NamaKategori'),
                  'isActive'   => $this->request->getVar('isActive'),
              );

              if($validation->run($data, 'KategoriBahanMakanan') == FALSE){
                  session()->setFlashdata('inputs', $this->request->getPost());
                  session()->setFlashdata('errors', $validation->getErrors());
                  return redirect()->to(base_url('KategoriBahanMakanan/edit/'.$id));
              } else {
                  $model = new KategoriBahanMakananModel();
                  $ubah = $model->updateCategory($data, $id);
                  if($ubah)
                  {
                      session()->setFlashdata('info', 'Updated Category successfully');
                      return redirect()->to(base_url('KategoriBahanMakanan'));
                  }
              }
          }


}
