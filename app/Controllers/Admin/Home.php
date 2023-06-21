<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KategoriModel;
use App\Models\Admin\PromoModel;
use App\Models\Admin\KaryawanModel;

class Home extends BaseController{

    protected $kategoriModel, $promoModel, $karyawanModel;
	public function __construct() {
		$this->kategoriModel 	= new KategoriModel();
		$this->promoModel = new PromoModel();
		$this->karyawanModel = new KaryawanModel();

	}

    public function index(){
        $data['title'] = "Dashboard Admin";
        return view("admin/home", $data);
        // . view("admin/home")
        // . view("admin/main/footer");
    }

    public function karyawan(){
        $data['title'] = "Daftar Karyawan";
        $data['detail'] = $this->karyawanModel->select("*")->where("status", "1")->get()->getResultArray();
        return view("admin/karyawan", $data);
        // . view("admin/karyawan")
        // . view("admin/main/footer");
    }

    public function promo(){
        $data['title'] = "Daftar Promo";
        $data['detail'] = $this->promoModel->select("*")->get()->getResultArray();
        return view("admin/promo", $data);
        // . view("admin/promo")
        // . view("admin/main/footer");
    }

    public function laporan(){
        $data['title'] = "Daftar Laporan";
        return view("admin/laporan", $data);
        // . view("admin/laporan")
        // . view("admin/main/footer");
    }

    public function komplain(){
        $data['title'] = "Daftar Komplain";
        return view("admin/komplain", $data);
        // . view("admin/komplain")
        // . view("admin/main/footer");
    }

    public function produk(){
        $data['title'] = "Daftar Produk";
        return view("admin/produk", $data);
        // . view("admin/produk")
        // . view("admin/main/footer");
    }

    public function infoToko(){
        $data['title'] = "Info Toko";
        return view("admin/info-toko", $data);
        // . view("admin/info-toko")
        // . view("admin/main/footer");
    }

    function laporanPenjualan(){
        $data['title'] = "Laporan Penjualan";
        return view("admin/laporan-penjualan", $data);
        // . view("admin/laporan-penjualan")
        // . view("admin/main/footer");
    }

    function laporanStok(){
        $data['title'] = "Laporan Stok";
        return view("admin/laporan-stok", $data);
        // . view("admin/laporan-stok")
        // . view("admin/main/footer");
    }

    function kategori(){
        $data['title']  = "Daftar Kategori";
        $data['detail'] = $this->kategoriModel->select("*")->where("status", "1")->get()->getResultArray();
        return view("admin/kategori", $data);
        // . view("admin/kategori")
        // . view("admin/main/footer");
    }
}
