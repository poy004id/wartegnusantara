<?php namespace App\Controllers;

use App\Models\Menu_model;
use App\Models\Kategori_Menu_model;


class Menu extends BaseController
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
		 $model= new Menu_model();
		 $data['menu'] = $model->select('menu.id as id, nama_menu,jumlah,keterangan,harga,id_kategori_menu,nama_kategori')
		 												->join('kategori_menu', 'menu.id_kategori_menu=kategori_menu.id')
		 												->findAll();

		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    echo view('menu/index',$data);
		echo view('_partials/footer');
    }

		public function create()
		{
			$model= new Kategori_Menu_model();
			$data['userdata'] = session('username');
			$data['menu'] = $model->findAll();
			echo view('_partials/header',$data);
			echo view('_partials/sidebar',$data);
			echo view('menu/create',$data);
			echo view('_partials/footer');

		}

		public function store()
		{
			$model= new Menu_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_menu' => $this->request->getPost('nama_menu'),
						'jumlah' => $this->request->getPost('jumlah'),
						'harga' => $this->request->getPost('harga'),
						'keterangan' => $this->request->getPost('keterangan'),
						'id_kategori_menu' => $this->request->getPost('id_kategori_menu'),
				];
			//cek validasi
			if($validation->run($data, 'menu') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('menu/create'));
				}
				//preses insert ke db
			$model->insert($data);
			session()->setFlashdata('success', 'Menu berhasil ditambahakn');
			return redirect()->to('/menu');
		}

		public function edit($id=FALSE)
				{
					$model = new Menu_model();
					$kategori_model = new Kategori_Menu_model();

					$data = array(
							'menu' => $model->find($id),
							'kategoriData' => $kategori_model->findAll(),
					);
					$data['userdata'] = session('username');

						echo view('_partials/header', $data);
						echo view('_partials/sidebar');
						echo view('menu/edit', $data);
					 echo view('_partials/footer');
				}

		public function update()
		{
			$id = $this->request->getPost('id');
			$model= new Menu_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'nama_menu' => $this->request->getPost('nama_menu'),
						'jumlah' => $this->request->getPost('jumlah'),
						'harga' => $this->request->getPost('harga'),
						'keterangan' => $this->request->getPost('keterangan'),
						'id_kategori_menu' => $this->request->getPost('id_kategori_menu'),
				];

				// echo "<pre>";
				// foreach ($data as $key => $row) {
				//   print_r($row);
				//   echo "<br/>";
				// }
				//
				// exit;


			//cek validasi
			if($validation->run($data, 'menu') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('menu/edit'));
					// return redirect(base_url()."menu/edit/".$id);

				}

			//proses update ke db
			$model->update($id,$data);
			session()->setFlashdata('success', 'Menu Makanan berhasil diupdate');
			return redirect()->to('/menu');
		}

		public function delete($id)
		{

			$model= new Menu_model();
			$model 	->where('id', $id)
						  ->delete();
			session()->setFlashdata('success', 'Menu Makanan berhasil di delete');
			return redirect()->to('/menu');
		}

}
