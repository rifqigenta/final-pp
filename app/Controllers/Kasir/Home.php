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
	// public function index()
	// {
	// 	$data['title'] = 'Dashboard Kasir';
	// 	return view('kasir/menu_utama')
	// }
	// public function __construct() 
    // {
    //     $this->session = session();
    // }

    // public function index(){
    //     // $data['title'] = "Dashboard Admin";
    //     // return view("admin/home", $data);
    //     // . view("admin/home")
    //     // . view("admin/main/footer");
    //     if(!$this->session->has('isLogin')){
    //         return redirect()->to('/login');
    //     }

    //     if($this->session->get('level') !=1){
    //         return redirect()->to('/login');
    //     }
    //     return view('/kasir');
    // }
}
