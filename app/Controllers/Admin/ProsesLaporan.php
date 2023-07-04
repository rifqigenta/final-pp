<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DetailTransaksiModel;

class ProsesLaporan extends BaseController{

    protected $detailTransaksiModel;
    public function __construct(){
        $this->detailTransaksiModel = new DetailTransaksiModel();
    }

    public function detailTransaksi($idTransaksi){
        $data = $this->detailTransaksiModel->select("transaksi_detail.*, b.nama")->JOIN("produk b", "transaksi_detail.id_produk=b.id_produk")->where("id_transaksi", $idTransaksi)->get()->getResultArray();
        echo json_encode($data);
    }
}
