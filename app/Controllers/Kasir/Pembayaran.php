<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\Kasir\TransaksiModel;
use App\Models\Kasir\TransaksiDetailModel;
use App\Models\Kasir\ProdukModel;


class Pembayaran extends BaseController
{

    protected $transaksiModel, $transaksiDetailModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
        $this->produkModel = new ProdukModel();
    }

    public function bayar()
    {
        $cart = \Config\Services::cart();
        $keranjang = $cart->contents();
        
        $id_kasir = session('id_kasir');
        $kode_promo = null;
        $total_bayar = $cart->total();
        $total_transaksi = $cart->total();

        $tgl_pembelian = date('Y-m-d H:i:s');

        $transaksiData = array(
            'id_kasir' => $id_kasir,
            'kode_promo' => $kode_promo,
            'total_bayar' => $total_bayar,
            'tgl_pembelian' => $tgl_pembelian,
            'total_transaksi' => $total_transaksi
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

            // Mengurangi Stok
            $kuantitas = $this->produkModel->select("kuantitas")->where("id_produk", $item['id'])->get()->getRowArray()['kuantitas'];
            $dataProduk = ["kuantitas"=>$kuantitas-$item['qty']];
            $this->produkModel->update($item['id'], $dataProduk);

            $transaksiDetailModel->insert($transaksiDetailData);
        }

        $cart->destroy();
        session()->remove('cart');

        echo json_encode(1);
    }
}
