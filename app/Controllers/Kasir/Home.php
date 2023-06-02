<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;

class Home extends BaseController{
	public function index(){
		$data['title'] = "Dashboard Kasir";
		return view("kasir/main/header", $data)
		. view("kasir/home")
		. view("kasir/main/footer");
	}
}
