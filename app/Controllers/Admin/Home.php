<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController{

    public function index(){
        $data['title'] = "Dashboard Admin";
        return view("admin/main/header", $data)
        . view("admin/home")
        . view("admin/main/footer");
    }

    public function karyawan(){
        $data['title'] = "Daftar Karyawan";
        return view("admin/main/header", $data)
        . view("admin/karyawan")
        . view("admin/main/footer");
    }

    public function promo(){
        $data['title'] = "Daftar Promo";
        return view("admin/main/header", $data)
        . view("admin/promo")
        . view("admin/main/footer");
    }

    public function laporan(){
        $data['title'] = "Daftar Laporan";
        return view("admin/main/header", $data)
        . view("admin/laporan")
        . view("admin/main/footer");
    }

    public function komplain(){
        $data['title'] = "Daftar Komplain";
        return view("admin/main/header", $data)
        . view("admin/komplain")
        . view("admin/main/footer");
    }

    public function produk(){
        $data['title'] = "Daftar Produk";
        return view("admin/main/header", $data)
        . view("admin/produk")
        . view("admin/main/footer");
    }

    public function infoToko(){
        $data['title'] = "Info Toko";
        return view("admin/main/header", $data)
        . view("admin/info-toko")
        . view("admin/main/footer");
    }
}
