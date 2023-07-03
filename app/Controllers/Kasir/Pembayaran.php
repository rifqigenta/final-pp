<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\Kasir\TransaksiModel;
use App\Models\Kasir\TransaksiDetailModel;

class Pembayaran extends BaseController
{

    protected $transaksiModel, $transaksiDetailModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
    }

    public function bayar()
    {
        $cart = \Config\Services::cart();
        $keranjang = $cart->contents();
        
        $id_kasir = session('id_kasir');
        $kode_promo = "tfhg657";
        $total_bayar = $cart->total();
        $tgl_pembelian = date('Y-m-d');

        $transaksiData = array(
            'id_kasir' => $id_kasir,
            'kode_promo' => $kode_promo,
            'total_bayar' => $total_bayar,
            'tgl_pembelian' => $tgl_pembelian
        );

        $transaksiModel = new TransaksiModel();
        $transaksiModel->insert($transaksiData);
        $id_transaksi = $transaksiModel->getInsertID();

        $transaksiDetailModel = new TransaksiDetailModel();

        foreach ($keranjang as $item) {
            $transaksiDetailData = array(
                'id_transaksi' => $id_transaksi,
                'id_produk' => $item['id'],
                'harga' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal']
            );

            $transaksiDetailModel->insert($transaksiDetailData);
        }

        $cart->destroy();

        return redirect()->to('kasir/pembayaran');
        session()->remove('cart');
    }
}
