<?php namespace App\Controllers;

use App\Models\Kategori_Bahan_model;


class Kategori_Bahan extends BaseController
{

	public function __construct()
    {
		$session = \Config\Services::session();
		//
		// if(session()->get('level') != "Admin" && session()->get('status') != "Active"){
		// 	session()->setFlashdata('errors', ['' => 'Silahkan login terlebih dahulu untuk mengakses data.']);
		// 	return redirect()->to('/auth/login');
		// 	}
		//
		// 	echo"123";
		// 	exit;
		}

	public function index()
	{
		 $data['userdata'] = session('username');
		 $model= new Kategori_Bahan_model();
		 $data['kategori'] = $model	->where('status', 'active')
		 														->findAll();
		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    echo view('kategori_bahan/index',$data);
		echo view('_partials/footer');
    }

		public function create()
		{
			$data['userdata'] = session('username');
			$data['inputs'] = session('inputs');
			//print_r($data['inputs']);exit;
			echo view('_partials/header',$data);
			echo view('_partials/sidebar',$data);
			echo view('kategori_bahan/create');
			echo view('_partials/footer');

		}

		public function store()
		{
			$model= new Kategori_Bahan_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'status' => $this->request->getPost('status'),
				];

			if($validation->run($data, 'kategori_bahan') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('kategori_bahan/create'));
				}

			$model->insert($data);
			session()->setFlashdata('success', 'Kategori berhasil ditambahakn');
			return redirect()->to('/kategori_bahan');
		}

		public function edit($id)
				{
						$model= new Kategori_Bahan_model();
						$data['userdata'] = session('username');
						$data['inputs'] = session('inputs');
						$data['kategori'] = $model	->where('id', $id)
																				->find();
						echo view('_partials/header', $data);
						echo view('_partials/sidebar');
						echo view('kategori_bahan/edit', $data);
					 echo view('_partials/footer');
				}

		public function update()
		{
			$id = $this->request->getPost('id');
			$model= new Kategori_Bahan_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_kategori' => $this->request->getPost('nama_kategori'),
						'status' => $this->request->getPost('status'),
				];

			if($validation->run($data, 'kategori_bahan') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('kategori_bahan/create'));
				}
			// $userModel->update($id, $data);
			$model->update($id,$data);
			session()->setFlashdata('success', 'Kategori berhasil ditambahakn');
			return redirect()->to('/kategori_bahan');
		}

		public function delete($id)
		{

			$model= new Kategori_Bahan_model();
			$model 	->where('id', $id)
						  ->set(['status' => 'inactive'])
						  ->update();
			session()->setFlashdata('success', 'Kategori berhasil di delete');
			return redirect()->to('/kategori_bahan');
		}

}


		 // echo "<pre>";
		 // foreach ($data['kategori'] as $key => $row) {
			//  print_r($row);
     //   echo "<br/>";
		 // }
		 //
     // exit;
