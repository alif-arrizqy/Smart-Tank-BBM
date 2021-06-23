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
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['tinggi_pertalite'] = $this->mainModel->get_tinggi_pertalite();
		$data['tinggi_pertamax'] = $this->mainModel->get_tinggi_pertamax();
		return view('user/index', $data);
	}

	public function profile()
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		if (session()->get('username') == '') {
			session()->setFlashdata('gagal', 'Anda belum login !');
			return redirect()->to(base_url('/Login'));
		}
		$data['profil'] = $this->mainModel->myprofile()->getRow();
		return view('user/profile', $data);
	}
}
