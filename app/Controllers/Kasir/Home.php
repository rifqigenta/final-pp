<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;

class Home extends BaseController{
	public function index(){
		$data['title'] = "Dashboard Kasir";
		return view("kasir/main/header", $data)
		. view("kasir/home")
		. view("kasir/main/menu_utama")
		. view("kasir/main/footer");
	}
	public function payment(){
		$data['title'] = "Pembayaran";
		return view("kasir/main/header", $data)
		. view("kasir/home")
		. view("kasir/main/pembayaran")
		. view("kasir/main/footer");
	}
	public function loginKasir(){
		$data['title'] = "Login";
		return view("kasir/main/login", $data);
	}
}
