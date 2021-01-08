<?php namespace App\Controllers;

use App\Models\Transaksi_Model;
use App\Models\Detail_Transaksi_Model;

class Laporan_Transaksi extends BaseController
{
	protected $db, $builder;
	public function __construct()
    {
		$session = \Config\Services::session();
		helper('form');
		$this->db 	 = \Config\Database::connect();
		$this->builder = $this->db->table('transaksi');
	}

	  public function cetak(){
        $transaksimodel= new Transaksi_model();
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $ket = 'Data Transaksi Tanggal '.date('Y-m-d', strtotime($tgl));
                $url_cetak = 'Laporan_Transaksi/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $transaksimodel->view_by_date($tgl);

            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                // $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'Laporan_Transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $transaksimodel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'Laporan_Transaksi/cetak?filter=3&tahun='.$tahun;
                $transaksi = $transaksimodel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'Laporan_Transaksi/cetak';
            $transaksi = $transaksimodel->findAll(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

				$transaksi_model= new Transaksi_model();
					$detail_transaksi_model= new Detail_Transaksi_model();
        $data['ket'] = $ket;
        //$data['transaksi'] = $transaksi;
				$data['detail_transaksi'] = $detail_transaksi_model->select(' *,transaksi.id as id, detail_transaksi.id_transaksi as id_detail, detail_transaksi.harga as harga, detail_transaksi.jumlah as jumlah, nama_menu, id_menu')
					->join('transaksi', 'detail_transaksi.id_transaksi=transaksi.id')
					->join ('menu', 'detail_transaksi.id_menu= menu.id')
					// ->where($filter_column, $filter_var )
					->where($where )
					->findAll();
				$data['transaksi'] = $transaksi_model->select('date_format(tanggal,"%d-%m-%Y") as tanggal, total_harga,id_user,id_menu,id_transaksi, count(1) as count')->join('detail_transaksi', 'transaksi.id= detail_transaksi.id_transaksi')
					// ->where($filter_column, $filter_var )
					->where($where )
					->orderBy('tanggal','desc')
					->groupBy ('id_transaksi')
					->find();
				$data['option_tahun'] = $transaksi_model->select('YEAR(tanggal) AS tahun')->orderBy('YEAR(tanggal)')->groupBy('YEAR(tanggal)')->findAll();
				$data['option_bulan'] = $transaksi_model->select('MONTH(tanggal) AS bulan')->orderBy('MONTH(tanggal)')->groupBy('MONTH(tanggal)')->findAll();
				// $data['transaksi'] = $transaksi;

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml(view('transaksi/print', $data));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("laporan-penjualan.pdf", array('Attachment' => false));
  }

	public function index() {
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
									$tanggal = $_GET['tanggal'];
									$where="DATE(tanggal) = '$tanggal'";
									$ket = 'Data Transaksi Tanggal '.date('d M Y', strtotime($tanggal));
									$url_cetak = 'laporan_transaksi/cetak?filter=1&tanggal='.$tanggal;
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
									$bulan =$_GET['bulan'];
									$tahun= $_GET['tahun'];
									$where="MONTH(tanggal) = '$bulan' and YEAR(tanggal) = '$tahun'";
								  $ket = 'Data Transaksi Bulan '.date('M', strtotime($bulan)).' '.$tahun;
									$url_cetak = 'Laporan_Transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
            }else{ // Jika filter nya 3 (per tahun)
									// $filter_column ="YEAR(tanggal)" ;
									$tahun = $_GET['tahun'];
									$where="YEAR(tanggal) = '$tahun'";
									$ket = 'Data Transaksi Tahun '.$tahun;
									$url_cetak = 'Laporan_Transaksi/cetak?filter=3&tahun='.$tahun;
        		}
      }else{ // Jika user tidak mengklik tombol tampilkan
							$filter_column ="id_user" ;
							$filter_var = "admin";
							$where="id_user IN ('admin', 'koki', 'kasir')";
							$ket = 'Data Semua Transaksi';
							$url_cetak = 'Laporan_Transaksi/cetak';
        }

			$data['userdata'] = session('userdata');
			$transaksi_model= new Transaksi_model();
			$detail_transaksi_model= new Detail_Transaksi_model();
			// $filterrr = "'id_menu', '1' ";
			// echo $filterrr;
			// exit;
			$data['detail_transaksi'] = $detail_transaksi_model->select(' *,transaksi.id as id, detail_transaksi.id_transaksi as id_detail, detail_transaksi.harga as harga, detail_transaksi.jumlah as jumlah, nama_menu, id_menu')
				->join('transaksi', 'detail_transaksi.id_transaksi=transaksi.id')
				->join ('menu', 'detail_transaksi.id_menu= menu.id')
				// ->where($filter_column, $filter_var )
				->where($where )
				->findAll();
			$data['transaksi'] = $transaksi_model->select('date_format(tanggal,"%d-%m-%Y") as tanggal, total_harga,id_user,id_menu,id_transaksi, count(1) as count')->join('detail_transaksi', 'transaksi.id= detail_transaksi.id_transaksi')
				// ->where($filter_column, $filter_var )
				->where($where )
				->orderBy('tanggal','desc')
				->groupBy ('id_transaksi')
				->find();
			$data['option_tahun'] = $transaksi_model->select('YEAR(tanggal) AS tahun')->orderBy('YEAR(tanggal)')->groupBy('YEAR(tanggal)')->findAll();
			$data['option_bulan'] = $transaksi_model->select('MONTH(tanggal) AS bulan')->orderBy('MONTH(tanggal)')->groupBy('MONTH(tanggal)')->findAll();
      $data['ket'] = $ket;
	    $data['url_cetak'] = base_url($url_cetak);
	    // $data['transaksi'] = $transaksi;

	 echo view('_partials/header',$data);
	 echo view('_partials/sidebar',$data);
	 echo view('transaksi/index2',$data);
	 echo view('_partials/footer');
	}
}
