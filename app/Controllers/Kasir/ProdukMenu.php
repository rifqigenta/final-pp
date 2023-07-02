<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;
use App\Models\Kasir\ProdukModel;

class ProdukMenu extends BaseController{


    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function produk(){
        $produk = $this->produkModel->findAll();
        $data = [
            'title' => 'Dashboard Menu Utama',
            'produk' => $produk,
            'cart' => \Config\Services::cart()
        ];
        
        return view('kasir/menu_utama', $data);
    }   

    public function cek(){
        $cart = \Config\Services::cart();
        // $cart->destroy();
        $response = $cart->contents();
        // $data = json_encode($response);
        echo '<pre>';
        print_r($response); 
        echo '</pre>';
    }

    public function add() {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id' => $this->request->getPost('id'),
            'qty' => 1,
            'price' => $this->request->getPost('price'),
            'name' => $this->request->getPost('name'),
            'options' => array(
                'gambar' => $this->request->getPost('gambar'),
                // 'kuantitas' => $this->request->getPost('kuantitas')
            )
        ));

        session()->set('cart', $cart->contents());

        return redirect()->to(base_url('kasir/menu_utama'));
    }

    public function checkout() 
    {
        $cart = \Config\Services::cart();
        // $cart->destroy();

        return redirect()->to('kasir/pembayaran');
        
    }

    public function clear() {
        $cart = \Config\Services::cart();
        $cart->destroy();
        // $keranjang->destroy();

        return redirect()->to('kasir/menu_utama');
    }
}