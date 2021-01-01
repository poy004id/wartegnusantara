<?php namespace App\Controllers;

use App\Models\Bahan_model;
use App\Models\Kategori_Bahan_model;


class Bahan extends BaseController
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
		 $model= new Bahan_model();
		 $data['bahan'] = $model->select('bahan.id as id, nama_bahan,jumlah,satuan,id_kategori_bahan,nama_kategori')
		 												->join('kategori_bahan', 'bahan.id_kategori_bahan=kategori_bahan.id','left outer')
		 												->findAll();

		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    echo view('bahan/index',$data);
		echo view('_partials/footer');
    }

		public function create()
		{
			$model= new Kategori_Bahan_model();
			$data['userdata'] = session('username');
			$data['bahan'] = $model
														 ->findAll();
			echo view('_partials/header',$data);
			echo view('_partials/sidebar',$data);
			echo view('bahan/create',$data);
			echo view('_partials/footer');

		}

		public function store()
		{
			$model= new Bahan_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_bahan' => $this->request->getPost('nama_bahan'),
						'jumlah' => $this->request->getPost('jumlah'),
						'satuan' => $this->request->getPost('satuan'),
						'id_kategori_bahan' => $this->request->getPost('id_kategori_bahan'),
				];
			//cek validasi
			if($validation->run($data, 'bahan') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('bahan/create'));
				}
				//preses insert ke db
			$model->insert($data);
			session()->setFlashdata('success', 'Kategori berhasil ditambahakn');
			return redirect()->to('/bahan');
		}

		public function edit($id)
				{
					$model = new Bahan_model();
					$kategori_model = new Kategori_Bahan_model();

					$data = array(
							'bahan' => $model->find($id),
							'kategoriData' => $kategori_model->findAll(),
					);
					$data['userdata'] = session('username');

						echo view('_partials/header', $data);
						echo view('_partials/sidebar');
						echo view('bahan/edit', $data);
					 echo view('_partials/footer');
				}

		public function update()
		{
			$id = $this->request->getPost('id');
			$model= new Bahan_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_bahan' => $this->request->getPost('nama_bahan'),
						'jumlah' => $this->request->getPost('jumlah'),
						'satuan' => $this->request->getPost('satuan'),
						'id_kategori_bahan' => $this->request->getPost('id_kategori_bahan'),

				];
			//cek validasi
			if($validation->run($data, 'bahan') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('bahan/edit'));
				}

			//proses update ke db
			$model->update($id,$data);
			session()->setFlashdata('success', 'Bahan Makanan berhasil diupdate');
			return redirect()->to('/bahan');
		}

		public function delete($id)
		{

			$model= new Bahan_model();
			$model 	->where('id', $id)
						  ->delete();
			session()->setFlashdata('success', 'Bahan Makanan berhasil di delete');
			return redirect()->to('/bahan');
		}

}
