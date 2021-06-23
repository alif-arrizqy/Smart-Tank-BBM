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
		$this->email = \Config\Services::email();
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

	// email ----------------------------------------------------------
	public function sendEmailPertalite()
	{
		$date = time();
		$this->email->setFrom('ayatulloh.alif20@gmail.com', 'Alif AA');
		$this->email->setTo('atikmw24@gmail.com');

		$this->email->setSubject('Permintaan Pengisian Bahan Bakar Pertalite');
		$this->email->setMessage('
		<p>Bogor,' . date("Y-m-d", $date) . '</p>
		<p></p>
		<p>Kepada Yth.</p>
		<p></p>
		<p>Dengan Hormat,</p>
		<ke>Bersama dengan email ini kami mohon kepada Pertamina Pusat untuk dapat mengirimkan BBM jenis Pertalite sebesar 1000ml 
			ke SPBU 01-123-45 yang bertempat di:</p>
		<p>Lokasi : Jl. Mawar No. 20 Bogor</p>
		<p>Tanggal: ' . date("Y-m-d", $date) . '</p>
		<p>Untuk itu, kami mohon untuk dikirimkan BBM jenis pertalite ke lokasi dan tanggal yang sudah tertera.</p>
		<p>Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
		<p></p>
		<p></p>
		<p>Hormat kami,</p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p>Atik Medixa Winesti</p>');
		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}
	public function sendEmailPertamax()
	{
		$date = time();
		$this->email->setFrom('ayatulloh.alif20@gmail.com', 'Alif AA');
		$this->email->setTo('atikmw24@gmail.com');

		$this->email->setSubject('Permintaan Pengisian Bahan Bakar Pertamax');
		$this->email->setMessage('
		<p>Bogor,' . date("Y-m-d", $date) . '</p>
		<p></p>
		<p>Kepada Yth.</p>
		<p></p>
		<p>Dengan Hormat,</p>
		<ke>Bersama dengan email ini kami mohon kepada Pertamina Pusat untuk dapat mengirimkan BBM jenis Pertalite sebesar 1000ml 
			ke SPBU 01-123-45 yang bertempat di:</p>
		<p>Lokasi : Jl. Mawar No. 20 Bogor</p>
		<p>Tanggal: ' . date("Y-m-d", $date) . '</p>
		<p>Untuk itu, kami mohon untuk dikirimkan BBM jenis pertalite ke lokasi dan tanggal yang sudah tertera.</p>
		<p>Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
		<p></p>
		<p></p>
		<p>Hormat kami,</p>
		<p></p>
		<p></p>
		<p></p>
		<p></p>
		<p>Atik Medixa Winesti</p>');
		if (!$this->email->send()) {
			return false;
		} else {
			return true;
		}
	}
}
