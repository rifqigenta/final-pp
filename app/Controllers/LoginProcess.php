<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\KaryawanModel;
use App\Models\Login\LoginModel;

class LoginProcess extends BaseController
{

	protected $loginModel, $karyawanModel;
	public function __construct()
	{
		$this->loginModel = new LoginModel();
		$this->karyawanModel = new KaryawanModel();
	}

	public function login()
	{

		// Rules Validation
		$validate = [
			'uname' => [
				'label' => 'Username / Email',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => "*Harus Di isi",
				],
			],
			'pass' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => "*Harus Di isi",
				],
			],
		];

		if (!$this->validate($validate)) {
			return redirect()->back()->withInput();
		} else {
			$session = session();

			// Variabel Form
			$username = $this->request->getPost("uname");
			$password = $this->request->getPost("pass");

			// GET USERNAME
			$data = $this->loginModel->where('uname', $username)->first();

			if ($data) {

				// CEK PASSWORD
				$pass = $data['pass'];
				// $verifyPassword = password_verify($password, $pass);
				if (md5($password) === $pass) {

					// CEK STATUS
					$dataKasir = $this->karyawanModel->where('role_kode', $data['role_kode'])->first();
					$status = $dataKasir['status'];
					$level = $data['level'];
					if ($status == '1' && $level == '0' ) {

						$ses_data = [
							'id_user'	=> $data['id_user'],
							'uname'		=> $data['uname'],
							'logged_in'	=> true,
							'level' => $data['level'],
							'status' => $data['status'], 
							// 'uname'			=> $data['uname'],
							//selain insert, field di kanan
							// selebihnya field di kiri (UNTUK CRUD) 
						];
						session()->set($ses_data);
						return redirect()->to('/admin');
					} elseif ($status == 1) {
						$ses_data = [
							'id_user'	=> $data['id_user'],
							'uname' => $data['uname'],
							'logged_in'	=> true,
							'level' => $data['level'],
							'status' => $data['status'], 
						];
						session()->set($ses_data);
						return redirect()->to('/kasir/menu_utama');
					} 
				} 
				else {
					session()->setFlashdata('msgLogin', 'Username/Password Salah');
					return redirect()->to('/login');
				}
			} else {
				session()->setFlashdata('msgLogin', 'Username/Password Salah');
				return redirect()->to('/login');
			}
		}
	}
	
	public function logout()
	{
		// $session()->destroy();
		session()->destroy();
    	return redirect()->to('/login');

		// $this->sessionunset_userdata 
	}
}
