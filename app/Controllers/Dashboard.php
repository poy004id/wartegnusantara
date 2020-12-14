<?php
namespace App\Controllers;

use CodeIgniter\Controller;
// use Config\Email;
// use Config\Services;
// use App\Models\UserModel;
// use App\Models\LogsModel;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */


class Dashboard extends Controller
{

  // public function __construct()
  // {
  //   // start session
  //   $this->session = Services::session();
  // }

  public function index()
  {

    echo view('Dashboard');
  }

  // public function login()
  // {
  //   if ($this->session->isLoggedIn) {
  //     return redirect()->to('TestDasboard/index2');
  //   }
  //
  //   return view('auth/auth/login');
  // }

}
?>
