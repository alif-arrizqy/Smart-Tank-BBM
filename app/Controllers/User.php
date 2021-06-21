<?php


namespace App\Controllers;


date_default_timezone_set("Asia/Jakarta");

use App\Models\mainModel;

class User extends BaseController
{
	protected $mainModel;
	public function __construct()
	{
		$this->mainModel = new mainModel();
		helper('form');
	}
	public function index()
	{
		$data['tinggi_pertalite'] = $this->mainModel->get_tinggi_pertalite();
		$data['tinggi_pertamax'] = $this->mainModel->get_tinggi_pertamax();
		return view('user/index', $data);
	}

	// Pertalite -------------------------------------------------
	// public function save_tinggi_pertalite($tinggi)
	// {
	// 	$date = time();
	// 	$kirimdata['tinggi_ir'] = $tinggi;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_tinggi_pertalite($kirimdata);
	// 	return redirect()->to('/');
	// }
	// public function save_pertalite_masuk($masuk)
	// {
	// 	$date = time();
	// 	$kirimdata['data_masuk'] = $masuk;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_pertalite_masuk($kirimdata);
	// 	return redirect()->to('/');
	// }
	// public function save_pertalite_keluar($keluar)
	// {
	// 	$date = time();
	// 	$kirimdata['data_keluar'] = $keluar;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_pertalite_keluar($kirimdata);
	// 	return redirect()->to('/');
	// }


	// pertamax -------------------------------------------------
	// public function save_tinggi_pertamax($tinggi)
	// {
	// 	$date = time();
	// 	$kirimdata['tinggi_ir'] = $tinggi;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_tinggi_pertamax($kirimdata);
	// 	return redirect()->to('/');
	// }
	// public function save_pertamax_masuk($masuk)
	// {
	// 	$date = time();
	// 	$kirimdata['data_masuk'] = $masuk;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_pertamax_masuk($kirimdata);
	// 	return redirect()->to('/');
	// }
	// public function save_pertamax_keluar($keluar)
	// {
	// 	$date = time();
	// 	$kirimdata['data_keluar'] = $keluar;
	// 	$kirimdata['tanggal'] = date("d/m/Y", $date);
	// 	$kirimdata['bulan'] = date("m", $date);
	// 	// $kirimdata['jam'] = date("h:i:sa");
	// 	$this->mainModel->add_pertamax_keluar($kirimdata);
	// 	return redirect()->to('/');
	// }

	// public function save_token()
	// {
	// 	// $jumlah = $this->request->getPost('inputJumlah');
	// 	$date = time();
	// 	$tarif = 1467.28;
	// 	$jumlah = $this->request->getPost('inputJumlah');
	// 	round($kwh = $jumlah / $tarif);

	// 	$kirimdata = [
	// 		'jumlah' => $jumlah,
	// 		'kwh' => $kwh,
	// 		'tanggal' => date("d", $date),
	// 		'bulan' => date("m", $date),
	// 		'waktu' => date("H:i:s", $date)
	// 	];
	// 	$success = $this->mainModel->addToken($kirimdata);
	// 	if ($success) {
	// 		session()->setFlashData('sukses', 'Data berhasil disimpan');
	// 		return redirect()->to('/pages/token');
	// 	} else {
	// 		session()->setFlashData('gagal', 'Data gagal disimpan');
	// 		return redirect()->to('/pages/token');
	// 	}
	// }

	// public function edit_token($id)
	// {
	// 	$date = time();
	// 	$tarif = 1467.28;
	// 	$jumlah = $this->request->getPost('inputJumlah');
	// 	round($kwh = $jumlah / $tarif);

	// 	$kirimdata = [
	// 		'id' => $id,
	// 		'jumlah' => $jumlah,
	// 		'kwh' => $kwh,
	// 		'tanggal' => date("d", $date),
	// 		'bulan' => date("m", $date),
	// 		'waktu' => date("H:i:s", $date)
	// 	];
	// 	$this->mainModel->editToken($kirimdata);
	// 	session()->setFlashData('sukses', 'Data berhasil disimpan');
	// 	return redirect()->to('/pages/token');
	// }

	// public function delete_token($id)
	// {
	// 	$kirimdata = [
	// 		'id' => $id
	// 	];
	// 	$this->mainModel->deleteToken($kirimdata);
	// 	session()->setFlashData('hapus', 'Data berhasil dihapus');
	// 	return redirect()->to('/pages/token');
	// }

}
