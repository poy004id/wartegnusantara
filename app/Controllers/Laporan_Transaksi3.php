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
	public function index(){
		$data['userdata'] = session('userdata');
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
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

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

        $data['ket'] = $ket;
	    $data['url_cetak'] = base_url($url_cetak);
	    $data['transaksi'] = $transaksi;

				$this->builder->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
        $this->builder->orderBy('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->builder->groupBy('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        $query=$this->builder->get();
        $data['option_tahun'] = $query->getResult();

		echo view('_partials/header',$data);
		echo view('_partials/sidebar',$data);
    	echo view('transaksi/laporan',$data);
		echo view('_partials/footer');
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
								$url_cetak = 'Laporan_Transaksi/cetak?filter=1&tanggal='.tanggal;
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


        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml(view('transaksi/print', $data));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("laporan-penjualan.pdf", array('Attachment' => false));
  }

	public function index2() {
		// if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
    //         $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    //         if($filter == '1'){ // Jika filter nya 1 (per tanggal)
    //             $tgl = $_GET['tanggal'];
    //             $ket = 'Data Transaksi Tanggal '.date('Y-m-d', strtotime($tgl));
    //             $url_cetak = 'Laporan_Transaksi/cetak?filter=1&tanggal='.$tgl;
    //             $transaksi = $transaksimodel->view_by_date($tgl);
    //         }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
    //             $bulan = $_GET['bulan'];
    //             $tahun = $_GET['tahun'];
    //             $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
		//
    //             $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
    //             $url_cetak = 'Laporan_Transaksi/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
    //             $transaksi = $transaksimodel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
    //         }else{ // Jika filter nya 3 (per tahun)
    //             $tahun = $_GET['tahun'];
		//
    //             $ket = 'Data Transaksi Tahun '.$tahun;
    //             $url_cetak = 'Laporan_Transaksi/cetak?filter=3&tahun='.$tahun;
    //             $transaksi = $transaksimodel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
    //         }
    //     }else{ // Jika user tidak mengklik tombol tampilkan
    //         $ket = 'Semua Data Transaksi';
    //         $url_cetak = 'Laporan_Transaksi/cetak';
    //         $transaksi = $transaksimodel->findAll(); // Panggil fungsi view_all yang ada di TransaksiModel
    //     }

			$data['userdata'] = session('userdata');
			$transaksi_model= new Transaksi_model();
			$detail_transaksi_model= new Detail_Transaksi_model();

			$data['detail_transaksi'] = $detail_transaksi_model->select(' *,transaksi.id as id, detail_transaksi.id_transaksi as id_detail, detail_transaksi.harga as harga, detail_transaksi.jumlah as jumlah, nama_menu, id_menu')
				->join('transaksi', 'detail_transaksi.id_transaksi=transaksi.id')
				->join ('menu', 'detail_transaksi.id_menu= menu.id')
				->where('')
				->where('')
				->findAll();
			$data['transaksi'] = $transaksi_model->select('date_format(tanggal,"%d-%m-%Y") as tanggal, total_harga,id_user,id_transaksi, count(1) as count')->join('detail_transaksi', 'transaksi.id= detail_transaksi.id_transaksi') ->orderBy('tanggal','desc') ->groupBy ('id_transaksi') ->find();
			$data['option_tahun'] = $transaksi_model->select('YEAR(tanggal) AS tahun')->orderBy('YEAR(tanggal)')->groupBy('YEAR(tanggal)')->findAll();

      // $data['ket'] = $ket;
	    // $data['url_cetak'] = base_url($url_cetak);
	    // $data['transaksi'] = $transaksi;

	 echo view('_partials/header',$data);
	 echo view('_partials/sidebar',$data);
	 echo view('transaksi/index2',$data);
	 echo view('_partials/footer');
	}
}
