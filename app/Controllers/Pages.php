<?php


namespace App\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\mainModel;

class Pages extends BaseController
{
	protected $mainModel;
	public function __construct()
	{
		$this->mainModel = new mainModel();
		helper('form');
	}

	public function index()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['tinggi_pertalite'] = $this->mainModel->get_tinggi_pertalite();
		$data['tinggi_pertamax'] = $this->mainModel->get_tinggi_pertamax();
		return view('pages/index', $data);
	}

	// myProfile
	public function profile()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['profil'] = $this->mainModel->myprofile()->getRow();
		return view('pages/profile', $data);
	}

	// Management user
	public function manage_user()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['listUser'] = $this->mainModel->list_user();
		return view('pages/manage-user', $data);
	}


	// Pertalite -------------------------------------------------
	public function save_tinggi_pertalite($tinggi)
	{
		$date = time();
		$kirimdata['tinggi_ir'] 	= $tinggi;
		$kirimdata['tanggal'] 		= date("Y-m-d", $date);
		$kirimdata['waktu'] 		= date("H:i:s", $date);

		$this->mainModel->add_tinggi_pertalite($kirimdata);
		return redirect()->to('/Home');
	}
	public function save_pertalite_masuk($masuk)
	{
		$date = time();
		$kirimdata['data_masuk'] 	= $masuk;
		$kirimdata['tanggal'] 		= date("Y-m-d", $date);
		$kirimdata['waktu'] 		= date("H:i:s", $date);

		$this->mainModel->add_pertalite_masuk($kirimdata);
		return redirect()->to('/Home');
	}
	public function save_pertalite_keluar($keluar)
	{
		$date = time();
		$kirimdata['data_keluar'] = $keluar;
		$kirimdata['tanggal'] = date("Y-m-d", $date);
		$kirimdata['waktu'] = date("H:i:s", $date);

		$this->mainModel->add_pertalite_keluar($kirimdata);
		return redirect()->to('/Home');
	}


	// pertamax -------------------------------------------------
	public function save_tinggi_pertamax($tinggi)
	{
		$date = time();
		$kirimdata['tinggi_ir'] 	= $tinggi;
		$kirimdata['tanggal'] 		= date("Y-m-d", $date);
		$kirimdata['waktu'] 		= date("H:i:s", $date);

		$this->mainModel->add_tinggi_pertamax($kirimdata);
		return redirect()->to('/Home');
	}
	public function save_pertamax_masuk($masuk)
	{
		$date = time();
		$kirimdata['data_masuk'] 	= $masuk;
		$kirimdata['tanggal'] 		= date("Y-m-d", $date);
		$kirimdata['waktu'] 		= date("H:i:s", $date);

		$this->mainModel->add_pertamax_masuk($kirimdata);
		return redirect()->to('/Home');
	}
	public function save_pertamax_keluar($keluar)
	{
		$date = time();
		$kirimdata['data_keluar'] = $keluar;
		$kirimdata['tanggal'] = date("Y-m-d", $date);
		$kirimdata['waktu'] = date("H:i:s", $date);

		$this->mainModel->add_pertamax_keluar($kirimdata);
		return redirect()->to('/Home');
	}


	// grafik ------------------------------------------------
	public function grafik_masuk()
	{
		$data['rekap_pertalite'] = $this->mainModel->get_all_pertalite_masuk();
		$data['rekap_pertamax'] = $this->mainModel->get_all_pertamax_masuk();
		return view('pages/grafik_masuk', $data);
	}
	public function grafik_keluar()
	{
		$data['rekap_pertalite'] = $this->mainModel->get_all_pertalite_keluar();
		$data['rekap_pertamax'] = $this->mainModel->get_all_pertamax_keluar();
		return view('pages/grafik_keluar', $data);
	}

	// Laporan pengisian --------------------------------------------------
	public function pengisian_pertalite()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['lap_masuk_pertalite'] = $this->mainModel->get_all_lap_masuk_pertalite();
		
		return view('pages/pengisian-pertalite', $data);
	}
	public function pengisian_pertamax()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['lap_masuk_pertamax'] = $this->mainModel->get_all_lap_masuk_pertamax();
		return view('pages/pengisian-pertamax', $data);
	}

	// Laporan pengeluaran --------------------------------------------------
	public function pengeluaran_pertalite()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['lap_keluar_pertalite'] = $this->mainModel->get_all_lap_keluar_pertalite();
		
		return view('pages/pengeluaran-pertalite', $data);
	}
	public function pengeluaran_pertamax()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['lap_keluar_pertamax'] = $this->mainModel->get_all_lap_keluar_pertamax();
		return view('pages/pengeluaran-pertamax', $data);
	}
}
