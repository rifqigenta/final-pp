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

        // if (empty($keranjang)) {
        //     return redirect()->to('kasir/menu_utama');
        // }
        // $transaksiModel = new TransaksiModel();
        // $cartData = session('cart');

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

        // Hapus keranjang setelah checkout
        $cart->destroy();

        // Redirect ke halaman pembayaran
        return redirect()->to('kasir/pembayaran');
        // foreach($cartData as $item) {
        //     $transaksiModel->insert([
        //         'nama' => $item['name'],
        //         'jumlah' => $item['qty'],
        //         'diskon' => '-',
        //         'Harga' => $item['price']
        //     ]);
        // }



        session()->remove('cart');

        return  redirect()->to('kasir/pembayaran');
    }
}
