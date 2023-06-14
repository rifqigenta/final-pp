<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;

class Home extends BaseController{
	public function index(){
		$data['title'] = "Dashboard Kasir";
		return view("kasir/menu_utama", $data);
		// . view("kasir/home")
		// . view("kasir/main/menu_utama");
		// . view("kasir/main/footer");
	}
	public function payment(){
		$data['title'] = "Pembayaran";
		return view("kasir/pembayaran", $data);
		// . view("kasir/home")
		// . view("kasir/main/pembayaran")
		// . view("kasir/main/footer");
	}
	public function login(){
		$data['title'] = "Login";
		return view("kasir/login", $data);
	}
}
