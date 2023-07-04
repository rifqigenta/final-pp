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
		$cart = \Config\Services::cart();
		$kondisi = ["status" => "1", "kuantitas >" => 0];
		$produk = $this->produkModel->select("*")->where($kondisi)->get()->getResultArray();

		$keranjangCek = array();
		$keranjang = $cart->contents();
		foreach ($keranjang as $key => $value) {
            $keranjangCek[$key]['id'] = $value['id'];
            $keranjangCek[$key]['qty'] = $value['qty'];
        }

        $data = [
            'title' => 'Dashboard Menu Utama',
            'produk' => $produk,
            'cart' => $cart,
			'keranjangCart'=>$keranjangCek
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

	public function komplain(){
		$data['title'] = "Komplain";
		return view("kasir/komplain", $data);
	}
}
