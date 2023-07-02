<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;

class Home extends BaseController{
	public function index(){
		$data['title'] = "Dashboard Kasir";
		return view("kasir/menu_utama", $data);
	}

	public function payment(){
		$cart = \Config\Services::cart();
		$total = $cart->total();
		$data['total'] = $total;
		$data['keranjang'] = $cart->contents();
		$data['title'] = "Pembayaran";
		return view("kasir/pembayaran", $data);

	}
}
