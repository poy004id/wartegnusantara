<?php namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->auth_model = new Auth_model();
	}

    public function index()
    {
        if($this->cek_login() == TRUE){
			return redirect()->to('/dashboard');
		}
        echo view('auth/login');
    }

    public function login()
    {
        if($this->cek_login() == TRUE){
			return redirect()->to('/dashboard');
		}
        echo view('auth/login');
    }

    public function proses_login()
    {
        $validation =  \Config\Services::validation();

        $username  = $this->request->getPost('username');
        $pass   = $this->request->getPost('password');

        $data = [
            'username' => $username,
            'password' => $pass
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


                    // $userdata = [
                    // 'username'  => $cek_login['username'],
                    // 'email'     => $cek_login['nama'],
                    // 'level'     => $cek_login['level'],
                    // 'status'    =>$cek_login['status']
                    // ];
                    //
                    // $session->set_userdata($userdata);

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

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
