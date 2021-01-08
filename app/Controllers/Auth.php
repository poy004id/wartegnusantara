<?php namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
//         $this->cek_login();
        $this->auth_model = new Auth_model();
}

    public function login()
    {
        echo view('auth/login');
    }

    public function proses_login()
    {
        $validation =  \Config\Services::validation();

        $username  = $this->request->getPost('username');
        $pass   = $this->request->getPost('password');

        $data = [
            'username' => $username,
            'password' => $pass,
		         'logged_in' =>TRUE
        ];

        // echo "<pre>";
        // print_r($data);
        // exit;

        if($validation->run($data, 'authlogin') == FALSE){
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/auth/login');
        } else {

            $cek_login = $this->auth_model->cek_login($username);

            // username didapatkan
            if($cek_login == TRUE){
              // echo "<pre>";
              // print_r($pass);
              // echo "<br/>";
              // print_r($cek_login['password']);
              // exit;

                // jika username dan password cocok
                if(password_verify($pass, $cek_login['password'])) {
                    //


                    $userdata = [
                    'username'  => $cek_login['username'],
                    'nama'     => $cek_login['nama'],
                    'level'     => $cek_login['level'],
                    'status'    =>$cek_login['status']
                    ];

                    // $session->set_userdata($userdata);
                    session()->set('userdata', $userdata);
                    session()->set('username', $cek_login['username']);
                    session()->set('name', $cek_login['nama']);
                    session()->set('level', $cek_login['level']);
                    session()->set('status', $cek_login['status']);

                    // echo "<pre>";
                    //
                    // foreach ($cek_login as $key => $value) {
                    //   echo $value;
                    //     echo "<br/>";
                    // }
                    // print_r($cek_login['password']);
                    // exit;
                    return redirect()->to('/dashboard');
                // username cocok, tapi password salah
                } else {

                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salahdwd']);
                    return redirect()->to('/auth/login');
                }
            } else {
                // username tidak cocok / tidak terdaftar
                session()->setFlashdata('errors', ['' => 'username yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth/login');
            }
        }
    }

    // public function register()
    // {
    //     if($this->cek_login() == TRUE){
		// 	return redirect()->to('/dashboard');
		// }
    //     return view('auth/register');
    // }
    //
    // public function proses_register()
    // {
    //     $validation =  \Config\Services::validation();
    //
    //     $data = [
    //         'email'             => $this->request->getPost('email'),
    //         'name'              => $this->request->getPost('name'),
    //         'username'          => $this->request->getPost('username'),
    //         'password'          => $this->request->getPost('password'),
    //         'confirm_password'  => $this->request->getPost('confirm_password')
    //     ];
    //
    //     if($validation->run($data, 'authregister') == FALSE){
    //         session()->setFlashdata('errors', $validation->getErrors());
    //         session()->setFlashdata('inputs', $this->request->getPost());
    //         return redirect()->to('/auth/register');
    //     } else {
    //
    //         $datalagi = [
    //             'email'         => $this->request->getPost('email'),
    //             'name'          => $this->request->getPost('name'),
    //             'username'      => $this->request->getPost('username'),
    //             'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    //             'status'        => "Active",
    //             'level'         => "Admin"
    //         ];
    //
    //         $simpan = $this->auth_model->register($datalagi);
    //
    //         if($simpan){
    //             session()->setFlashdata('success_register', 'Register Successfully');
    //             return redirect()->to('/auth/login');
    //         }
    //
    //     }
    //
    // }
    public function user(){
      $data['userdata'] = session('userdata');
      $model= new Auth_model();
      $data['user'] = $model->findAll();

      echo view('_partials/header',$data);
      echo view('_partials/sidebar',$data);
      echo view('auth/user',$data);
      echo view('_partials/footer');
    }
    public function create(){
      $data['userdata'] = session('userdata');
      echo view('_partials/header',$data);
      echo view('_partials/sidebar',$data);
      echo view('Auth/create');
      echo view('_partials/footer');
    }

    public function store()
		{
			$model= new Auth_model();
			$validation =  \Config\Services::validation();

			$data = [
						'id' => $this->request->getPost('id'),
						'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),

            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
						'status' => $this->request->getPost('status'),
            'role' => $this->request->getPost('role'),
            'no_hp' => $this->request->getPost('no_hp'),
				];



			if($validation->run($data, 'user') == FALSE){
					session()->setFlashdata('inputs', $this->request->getPost());
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('auth/create'));
				}
      $data['password']=password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			$model->insert($data);
      session()->setFlashdata('success', 'User berhasil ditambahkan');
			return redirect()->to('/auth/user');
		}

    public function edit($id=FALSE){
      $data['userdata'] = session('userdata');
      $model= new Auth_model();
      $data['user'] = $model->find($id);


      echo view('_partials/header',$data);
      echo view('_partials/sidebar',$data);
      echo view('auth/edit',$data);
      echo view('_partials/footer');
    }

    public function update()
		{
			$model= new Auth_model();
			$validation =  \Config\Services::validation();
			$data = [
						'id' => $this->request->getPost('id'),
						'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
						'status' => $this->request->getPost('status'),
            'level' => $this->request->getPost('level'),
            'no_hp' => $this->request->getPost('no_hp'),
				];

        //if inputan password tidak diisi, pasword adalah password awal yg di ambil dari sql
        if ($data['password'] ==null){
          $user= $model->find($data['id']);
          $data['password']=$user['password'];
        }
        //jika inputan passwod diisi, password di enkripsi
        else {
        $data['password']=password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }


        //validation, jika gagal kembali ke menu edit dengan memdawa data $data
			if($validation->run($data, 'user') == FALSE){
          session()->setFlashdata('inputs',$data );
					session()->setFlashdata('errors', $validation->getErrors());
					return redirect()->to(base_url('auth/edit'));
				}


			$model->update($data['id'],$data);
      session()->setFlashdata('success', 'User berhasil di update');
			return redirect()->to('/auth/user');
		}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
