<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;
use App\Models\Kasir\ProdukModel;

class Home extends BaseController{

	protected $produkModel;
	public function __construct()
	{
		$this->produkModel = new ProdukModel();
	}

	public function index(){
		$kondisi = ["status" => "1", "kuantitas >" => 0];
		$produk = $this->produkModel->select("*")->where($kondisi)->get()->getResultArray();
        $data = [
            'title' => 'Dashboard Menu Utama',
            'produk' => $produk,
            'cart' => \Config\Services::cart()
        ];
        
        return view('kasir/menu_utama', $data);
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
